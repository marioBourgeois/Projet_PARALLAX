<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ScienceController extends AbstractController
{
    /**
     * @Route("/science", name="science")
     */

    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();

        return $this->render('science/science.html.twig', [
            'articles' => $articles,
        ]);
    }
}
