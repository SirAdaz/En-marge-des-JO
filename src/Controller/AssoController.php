<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AssoController extends AbstractController
{
    #[Route('/asso', name: 'app_asso')]
    public function index(UserRepository $userRepo): Response
    {
        return $this->render('asso/index.html.twig', [
            'users' => $userRepo->findAll()
        ]);
    }
}
