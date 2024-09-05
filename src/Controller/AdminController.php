<?php

// src/Controller/AdminController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin/add-association', name: 'app_add_association')]
    public function addAssociation(): Response
    {
        // Ajouter une association
        return $this->render('admin/add_association.html.twig');
    }

    #[Route('/admin/edit-association', name: 'app_edit_association')]
    public function editAssociation(): Response
    {
        // Modifier une association
        return $this->render('admin/edit_association.html.twig');
    }

    #[Route('/admin/delete-association', name: 'app_delete_association')]
    public function deleteAssociation(): Response
    {
        // Supprimer une association
        return $this->render('admin/delete_association.html.twig');
    }
}

