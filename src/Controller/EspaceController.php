<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceController extends AbstractController
{
    /**
     * @Route("/espace", name="espace")
     */

    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();

        return $this->render('espace/espace.html.twig', [
            'articles' => $articles,
        ]);
    }
}
