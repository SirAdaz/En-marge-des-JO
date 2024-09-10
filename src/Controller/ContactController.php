<?php

namespace App\Controller;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
    public function register(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
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

            // Send confirmation email
            $email = (new Email())
                ->from('elyayusd@gmail.com') // Adresse email de l'expéditeur
                ->to($Email)
                ->subject('Confirmation de réception de Contact')
                ->text('Nous avons bien reçu votre message concernant votre association ' . $NameAsso . '. Nous vous répondrons dans les plus brefs délais.')
                ->html('<p>Nous avons bien reçu votre message concernant <strong>' . $NameAsso . '</strong>. Nous vous répondrons dans les plus brefs délais.<br>Sincères salutations, ArrasPlay</p>');

            $mailer->send($email);

            // Redirect after form submission
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
