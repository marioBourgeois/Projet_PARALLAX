<?php

namespace App\Controller;

use App\Repository\EspaceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceController extends AbstractController
{
    /**
     * @Route("/espace", name="espace")
     */

    public function index(EspaceRepository $espaceRepo): Response
    {
        $espace = $espaceRepo->findAll();

        return $this->render('espace/espace.html.twig', [
            'espace' => $espace,
        ]);
    }
}
