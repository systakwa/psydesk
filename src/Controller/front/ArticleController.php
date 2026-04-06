<?php

namespace App\Controller\front;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/front/article', name: 'front_article_')]
class ArticleController extends AbstractController
{
    // 👁️ afficher seulement validé
    #[Route('/', name: 'front_article_index')]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->createQueryBuilder('a')
            ->where('a.statut = :s')
            ->setParameter('s', 'valide')
            ->orderBy('a.date_post', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('front/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    // ➕ publication client
    #[Route('/new', name: 'front_article_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // ⚠️ statut toujours en attente
            $article->setStatut('en_attente');

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Article envoyé pour validation ✅');

            return $this->redirectToRoute(' front_article_front_article_index');
        }

        return $this->renderForm('front/article/new.html.twig', [
            'form' => $form,
        ]);
    }
}