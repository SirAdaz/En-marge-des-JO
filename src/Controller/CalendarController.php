<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Form\CalendarType;
use App\Repository\CalendarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/calendar')]
final class CalendarController extends AbstractController
{
    #[Route(name: 'app_calendar_index', methods: ['GET'])]
    public function index(CalendarRepository $calendarRepository): Response
    {
        return $this->render('calendar/index.html.twig', [
            'calendars' => $calendarRepository->findAll(),
        ]);
    }
     #[Route("/api/events", name: "api_events", methods: ["GET"])]

    public function getEvents(CalendarRepository $calendarRepository): JsonResponse
    {
        // Récupère tous les événements depuis la base de données
        $events = $calendarRepository->findAll();

        // Formatte les événements dans un tableau au format FullCalendar
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = [
                'title' => $event->getTitle(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd() ? $event->getEnd()->format('Y-m-d H:i:s') : null,
                'description' => $event->getDescription(),
                'nomUrl' => $event->getNomUrl(),
                'url' => $event->getUrl()
            ];
        }

        // Retourne les événements en JSON
        return new JsonResponse($formattedEvents);
    }
    #[Route('/new', name: 'app_calendar_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($calendar);
            $entityManager->flush();

            return $this->redirectToRoute('app_calendar_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calendar/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calendar_show', methods: ['GET'])]
    public function show(Calendar $calendar): Response
    {
        return $this->render('calendar/show.html.twig', [
            'calendar' => $calendar,
        ]);
    }

#[Route('/{id}/edit', name: 'app_calendar_edit', methods: ['PUT'])]
public function updateEvent(Request $request, Calendar $calendar, EntityManagerInterface $entityManager): JsonResponse
{
    $data = json_decode($request->getContent(), true);  // Récupère les données JSON envoyées

    // Met à jour les informations de l'événement
    $calendar->setTitle($data['title']);
    $calendar->setDescription($data['description']);
    $calendar->setStart(new \DateTime($data['start']));

    if (!empty($data['end'])) {
        // Si la valeur 'end' existe et n'est pas vide, on met à jour la date de fin
        $calendar->setEnd(new \DateTime($data['end']));
    } 

    $entityManager->flush();

    return new JsonResponse(['status' => 'success'], Response::HTTP_OK);
}



    #[Route('/{id}', name: 'app_calendar_delete', methods: ['POST'])]
    public function delete(Request $request, Calendar $calendar, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendar->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($calendar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_calendar_index', [], Response::HTTP_SEE_OTHER);
    }
}
