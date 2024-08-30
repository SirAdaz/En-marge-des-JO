<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();
            $email = $form->get('email')->getData();
            $userLastname = $form->get('userLastname')->getData();
            $userTel = $form->get('userTel')->getData();
            $userAdress = $form->get('userAdress')->getData();
            $userAssoTel = $form->get('userAssoTel')->getData();
            $userAssoName = $form->get('userAssoName')->getData();
            $userAssoAdress = $form->get('userAssoAdress')->getData();
            $userAssoSport = $form->get('userAssoSport')->getData();
            $userAssoDescr = $form->get('userAssoDescr')->getData();

            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
            $user->setEmail($email);
            $user->setUserLastname($userLastname);
            $user->setUserTel($userTel);
            $user->setUserAdress($userAdress);
            $user->setUserAssoTel($userAssoTel);
            $user->setUserAssoName($userAssoName);
            $user->setUserAssoAdress($userAssoAdress);
            $user->setUserAssoSport($userAssoSport);
            $user->setUserAssoDescr($userAssoDescr);

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('_preview_error');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
