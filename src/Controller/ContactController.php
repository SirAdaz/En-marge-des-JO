<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $NameAsso = $form->get('NameAsso')->getData();
            $Email = $form->get('Email')->getData();
            $Tel = $form->get('Tel')->getData();
            $Message = $form->get('Message')->getData();

            $contact->setNameAsso($NameAsso);
            $contact->setEmail($Email);
            $contact->setTel($Tel);
            $contact->setMessage($Message);

            $entityManager->persist($contact);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form,
        ]);
    }
}

