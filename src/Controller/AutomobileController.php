<?php

namespace App\Controller;

use App\Repository\AutomobileRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AutomobileController extends AbstractController
{
    /**
     * @Route("/automobile", name="automobile")
     */

    public function index(AutomobileRepository $automobileRepo): Response
    {
        $automobile = $automobileRepo->findAll();

        return $this->render('automobile/automobile.html.twig', [
            'automobile' => $automobile,
        ]);
    }
}

