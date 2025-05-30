<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    #[Route('/access-denied', name: 'access_denied')]
    public function accessDenied(): Response
    {
        return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
    }
}
