<?php

namespace App\Controller;

use App\Form\FavoriteType;
use App\Repository\FavoriteRepository;
use App\Repository\RoomRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/r')] //prefix all room routes with /r
class RoomController extends AbstractController
{
    #[Route('/', name: 'app_room')]
    public function index(
        RoomRepository $roomRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {

        $pagination = $paginator->paginate(
            $roomRepository->findAll(),
            $request->query->getInt('page', 1),
            12 // Items per page 
        );

        

        return $this->render('room/index.html.twig', [
            'rooms' => $pagination,
            'hostRooms' => $roomRepository->findBy(
                ['host' => $this->getUser()]
            )
        ]);
    }
}
