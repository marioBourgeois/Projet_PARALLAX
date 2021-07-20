<?php

namespace App\Controller;

use DateTime;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /* ADMIN PAGE */

    /**
     * @Route("/admin", name="admin_article")
     */
    public function admin(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();
        return $this->render('admin/admin.html.twig', [
            'articles' => $articles,
        ]);
    }

    /* ADMIN ARTICLE */

    /**
     * @Route("/admin/articles", name="admin_article_list")
     */
    public function adminlist(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();
        return $this->render('admin/adminlist.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/admin/article", name="admin_article_new")
     * @Route("/admin/article/{id}", name="admin_article_edit")
     */
    public function adminedit(Int $id = null, Article $article = null, Request $request): Response
    {
        if ($article){
            $article = new Article();}
        $form = $this->createForm(ArticleType::class,$article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('Enregistrer')->isClicked()) {
               $article->setDatePublication(new DateTime());
                $this->entityManager->persist($article);
                $this->entityManager->flush();
                return $this->redirectToRoute('admin_article_edit', ['slug' => $article->getId()]);
            }

            if ($form->get('Supprimer')->isClicked()) {
                $this->entityManager->remove($article);
                $this->entityManager->flush();
                return $this->redirectToRoute('admin_article_list');
            }
        }

        return $this->render('admin/adminedit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /* ADMIN CATEGORIE */

    /**
     * @Route("/admin/categories", name="admin_categorie_list")
     */
    public function categorielist(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();
        return $this->render('admin/categorielist.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/admin/categorie", name="admin_categorie_new")
     * @Route("/admin/categorie/{id}", name="admin_categorie_edit")
     */
    public function categorieedit(Article $article = null, Request $request): Response
    {
        if ($article == null) $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('Enregistrer')->isClicked()) {
               $article->setDatePublication(new DateTime());
                $this->entityManager->persist($article);
                $this->entityManager->flush();
                return $this->redirectToRoute('admin_categorie_edit', ['id' => $article->getId()]);
            }

            if ($form->get('Supprimer')->isClicked()) {
                $this->entityManager->remove($article);
                $this->entityManager->flush();
                return $this->redirectToRoute('admin_categorie_list');
            }
        }

        return $this->render('admin/categorieedit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
