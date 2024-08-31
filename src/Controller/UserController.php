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
        
        $user = new User();
        $user->setUserName('Assos Arrasiens');  
        $user->setEmail('assoarrassiens@email.com');
        $user->setDateCreation(new \DateTime()); 
        $user->setMembreDepuisLe(new \DateTime('2022-01-01')); 
        $user->setUserAssoSport('Tennis');  

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Utilisateur ajouté avec succès avec l\'ID '.$user->getId());
    }
}
