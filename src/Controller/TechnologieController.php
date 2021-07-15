<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologieController extends AbstractController
{
    /**
     * @Route("/technologie", name="technologie")
     */

    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();

        return $this->render('technologie/technologie.html.twig', [
            'articles' => $articles,
        ]);
    }
}
