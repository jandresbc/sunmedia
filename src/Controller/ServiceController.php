<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\EventsUsers;

/**
     * @Route(path="/api/")
     */
class ServiceController extends AbstractController
{
    /**
     * @Route("number_registers", name="nro_registers")
     */
    public function index(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        $data = $em->createQueryBuilder()
        ->from(EventsUsers::class,"e")
        ->select('e.ip_user, count(e.id) nro')
        ->groupBy("e.ip_user")
        ->getQuery()->getResult();

        return new JsonResponse(["data"=>$data]);
    }
}
