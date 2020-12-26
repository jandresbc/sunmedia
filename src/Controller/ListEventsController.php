<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\EventsUsersType;

use App\Entity\EventsUsers;

class ListEventsController extends AbstractController
{
    /**
     * @Route("/list/events", name="list_events")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(EventsUsers::class);
        $data = $repo->createQueryBuilder('EventsUsers')
        ->setMaxResults(30)->getQuery()
        ->getResult();

        return $this->render('list_events/index.html.twig', [
            'controller_name' => 'ListEventsController',
            'data' => $data
        ]);
    }

    /**
     * @Route("/new", name="new_events", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        
        $eventsUser = new EventsUsers();
        $now = new \DateTime("now");
        $eventsUser->setCreatedAt($now->format("Y-m-d H:i:s"));
        $eventsUser->setUpdatedAt($now->format("Y-m-d H:i:s"));
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $key = substr(str_shuffle($permitted_chars), 0, 6);
        $eventsUser->setEventKey($key);
        $eventsUser->setIpUser($request->server->get("REMOTE_ADDR"));
        $eventsUser->setUserAgent($request->server->get("HTTP_USER_AGENT"));
        $form = $this->createForm(EventsUsersType::class, $eventsUser);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eventsUser);
            $entityManager->flush();

            return $this->redirectToRoute('list_events');
        }

        return $this->render('list_events/new.html.twig', [
            'events_user' => $eventsUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit_events", methods={"GET","POST"})
     */
    public function edit(Request $request, EventsUsers $eventsUser): Response
    {
        $now = new \DateTime("now");
        $eventsUser->setUpdatedAt($now->format("Y-m-d H:i:s"));
        $form = $this->createForm(EventsUsersType::class, $eventsUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('list_events');
        }

        return $this->render('list_events/edit.html.twig', [
            'events_user' => $eventsUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bi", name="bi")
     */
    public function bi(): Response
    {
        return $this->render('bi/index.html.twig');
    }
}
