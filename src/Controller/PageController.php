<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'paris', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'Paris',
            'background' => 'paris',
        ]);
    }

    #[Route('/lasvegas', name: 'lasvegas', methods: ['GET'])]
    public function lasvegas(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'Las Vegas',
            'background' => 'lasvegas',
        ]);
    }


    #[Route('/kyoto', name: 'kyoto', methods: ['GET'])]
    public function kyoto(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'Kyoto',
            'subtitle'=> '京都市',
            'background' => 'kyoto',
        ]);
    }

    #[Route('/sydney', name: 'sydney', methods: ['GET'])]
    public function sydney(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'Sydney',
            'background' => 'sydney',
        ]);
    }

    #[Route('/hongkong', name: 'hongkong', methods: ['GET'])]
    public function hongkong(): Response
    {
        return $this->render('page/city.html.twig', [
            'title' => 'Hong Kong',
            'subtitle' => '香港',
            'background' => 'hongkong',
        ]);
    }

    // Test route for designing the confirmation email
    #[Route('/email', name: 'email')]
    public function email(): Response
    {
        return $this->render('registration/confirmation_email.html.twig', [
            'signedUrl'=>'https://example.com/signed-url',
            'expiresAtMessageKey'=>'The URL will expire at %expireAt%'
        ]);
    }
    /**
     * User account route for displaying it's own data on the app
     */
    #[Route('/account', name: 'account', methods: ['GET', 'POST'])]
    public function account(): Response
    {
        return $this->render('page/account.html.twig', [
        
        ]);
    }

}
