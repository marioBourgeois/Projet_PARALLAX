<?php

namespace App\Controller;

use App\Repository\TechnologieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologieController extends AbstractController
{
    /**
     * @Route("/technologie", name="technologie")
     */

    public function index(TechnologieRepository $technologieRepo): Response
    {
        $technologie = $technologieRepo->findAll();

        return $this->render('technologie/technologie.html.twig', [
            'technologie' => $technologie,
        ]);
    }
}
