<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
            /**
             * @var UploadedFile $uploadedFile
             */
            $uploadedFile =($form['imageFile']->getData());
            if ($uploadedFile) {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
    
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
            }

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
            $userTresorier = $form->get('userTresorier')->getData();
            $userPresident = $form->get('userPresident')->getData();
            $userSiteInternet = $form->get('userSiteInternet')->getData();
            $userLienX = $form->get('userLienX')->getData();
            $userLienFb = $form->get('userLienFb')->getData();
            $userLienInsta = $form->get('userLienInsta')->getData();

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
            $user->setUserTresorier($userTresorier);
            $user->setUserPresident($userPresident);
            $user->setUserSiteInternet($userSiteInternet);
            $user->setUserLienX($userLienX);
            $user->setUserLienFb($userLienFb);
            $user->setUserLienInsta($userLienInsta);
            $user->setUserDateCreation(new \DateTime()); 
            $user->setImageFileName($newFilename);

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success','User add');

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }
        

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
