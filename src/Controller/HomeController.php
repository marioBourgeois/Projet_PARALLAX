<?php

namespace App\Controller;

use App\Repository\AccueilRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AccueilRepository $accueilRepo): Response
    {
        $accueil = $accueilRepo->findAll();

        return $this->render('home/index.html.twig', [
            'accueil' => $accueil,
        ]);
    }
}
