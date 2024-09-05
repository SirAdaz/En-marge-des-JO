<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class HashPasswordsCommand extends Command
{
    protected static $defaultName = 'app:hash-passwords';
    private $entityManager;
    private $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Hash plain passwords in the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Récupérer tous les utilisateurs
        $users = $this->entityManager->getRepository(User::class)->findAll();

        foreach ($users as $user) {
            // Vérifier le hashage du mot de passe
            if (!$this->isPasswordHashed($user->getPassword())) {
                $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
                $user->setPassword($hashedPassword);
                $this->entityManager->persist($user);
            }
        }

        $this->entityManager->flush();
        $io->success('Tous les mots de passe ont été hachés.');

        return Command::SUCCESS;
    }

    // Vérifier si le mot de passe est déjà haché
    private function isPasswordHashed(string $password): bool
    {
        return strlen($password) > 60; // Hash bcrypt 
    }
}
