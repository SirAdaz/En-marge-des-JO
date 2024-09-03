<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/create', name: 'user_create')]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Créer une nouvelle instance de User
        $user = new User();
        $user->setEmail('assoarrassiens@email.com');

        // Persister l'utilisateur en base de données
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Utilisateur ajouté avec succès avec l\'ID '.$user->getId());
    }
}