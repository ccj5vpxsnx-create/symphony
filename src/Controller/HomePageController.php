<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(): Response
    {
        return $this->render('home_page/index.html.twig');
    }

    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $success = false;

        if ($request->isMethod('POST')) {
            $nom     = $request->request->get('nom');
            $success = true;
        }

        return $this->render('partial/contact.html.twig', [
            'success' => $success,
        ]);
    }

    #[Route('/moyenne/{note1}/{note2}', name: 'app_moyenne')]
    public function moyenne(float $note1, float $note2): Response
    {
        $moyenne = round(($note1 + $note2) / 2, 2);

        return $this->render('partial/moyenne.html.twig', [
            'moyenne' => $moyenne,
            'note1'   => $note1,
            'note2'   => $note2,
        ]);
    }
}