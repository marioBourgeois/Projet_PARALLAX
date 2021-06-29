<?php

namespace App\Controller;

use App\Repository\ScienceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ScienceController extends AbstractController
{
    /**
     * @Route("/science", name="science")
     */

    public function index(ScienceRepository $scienceRepo): Response
    {
        $science = $scienceRepo->findAll();

        return $this->render('science/science.html.twig', [
            'science' => $science,
        ]);
    }
}
