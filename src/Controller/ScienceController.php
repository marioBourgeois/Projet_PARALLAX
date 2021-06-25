<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScienceController extends AbstractController
{
    /**
     * @Route("/science", name="science")
     */
    public function index(): Response
    {
        return $this->render('science/index.html.twig', [
            'controller_name' => 'ScienceController',
        ]);
    }
}
