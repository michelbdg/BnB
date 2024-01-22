<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/r')] //prefix all room routes with /r
class RoomController extends AbstractController
{
    #[Route('/', name: 'app_room')]
    public function index(
        RoomRepository $roomRepository
    ): Response
    {
        return $this->render('room/index.html.twig', [
            'rooms' => $roomRepository->findAll(),
        ]);
    }
}
