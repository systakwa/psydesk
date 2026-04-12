<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/article')]
class AdminArticleController extends AbstractController
{
    #[Route('/', name: 'admin_article_index')]
    public function index(Request $request, ArticleRepository $repo): Response
    {
        $q = $request->query->get('q');
        $status = $request->query->get('status');
        $sort = $request->query->get('sort', 'id');
        $direction = $request->query->get('direction', 'asc');
        $page = max(1, $request->query->getInt('page', 1));

        $limit = 3;
        $offset = ($page - 1) * $limit;

        $qb = $repo->createQueryBuilder('a');

        if ($q) {
            $qb->andWhere('a.contenu LIKE :q')
               ->setParameter('q', "%$q%");
        }

        if ($status) {
            $qb->andWhere('a.statut = :status')
               ->setParameter('status', $status);
        }

        $qb->orderBy("a.$sort", $direction)
           ->setFirstResult($offset)
           ->setMaxResults($limit);

        $articles = $qb->getQuery()->getResult();

        $total = count($repo->findAll());
        $pages = ceil($total / $limit);

        // 🔥 AJAX → retourner seulement la table
       if ($request->isXmlHttpRequest()) {return $this->render('admin/template/admin_article/_table.html.twig', [
        'articles' => $articles,
        'pages' => $pages
    ]);
}

        return $this->render('admin/template/admin_article/index.html.twig', [
            'articles' => $articles,
            'pages' => $pages
        ]);
    }
#[Route('/stats', name: 'admin_article_stats')]
public function stats(ArticleRepository $repo): Response
{
    return $this->json([
        'total' => $repo->count([]),
        'valide' => $repo->count(['statut' => 'validé']),
        'attente' => $repo->count(['statut' => 'en_attente']),
        'refuse' => $repo->count(['statut' => 'refusé']),
    ]);
}
    #[Route('/{id}', name: 'admin_article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $em->remove($article);
            $em->flush();

            $this->addFlash('success', 'Article supprimé ❌');
        }

        return $this->redirectToRoute('admin_article_index');
    }
    #[Route('/{id}/edit', name: 'admin_article_edit')]
public function edit(Request $request, Article $article, EntityManagerInterface $em): Response
{
    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->flush();

        return $this->redirectToRoute('admin_article_index');
    }

    return $this->render('admin/template/admin_article/edit.html.twig', [
        'form' => $form->createView(),
        'article' => $article,
    ]);
}

    #[Route('/{id}/valider', name: 'admin_article_valider')]
    public function valider(Article $article, EntityManagerInterface $em): Response
    {
        $article->setStatut('validé');
        $em->flush();

        return $this->redirectToRoute('admin_article_index');
    }

    #[Route('/{id}/refuser', name: 'admin_article_refuser')]
    public function refuser(Article $article, EntityManagerInterface $em): Response
    {
        $article->setStatut('refusé');
        $em->flush();

        return $this->redirectToRoute('admin_article_index');
    }

    #[Route('/new', name: 'admin_article_new')]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );

                $article->setImage($newFilename);
            }

            $article->setStatut('en_attente');

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->renderForm('admin/template/admin_article/new.html.twig', [
            'form' => $form,
        ]);
    }
}