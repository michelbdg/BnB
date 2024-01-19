<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    #[Route('/room', name: 'app_room')]
    public function index(
        RoomRepository $roomRepository
    ): Response
    {
        return $this->render('room/index.html.twig', [
            'room' => $roomRepository->findAll(),
        ]);
    }
}
