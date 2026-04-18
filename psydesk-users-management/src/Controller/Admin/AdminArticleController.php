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
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/article', name: 'admin_article_')]
#[IsGranted('ROLE_ADMIN')] // 🔐 sécurité admin
class AdminArticleController extends AbstractController
{
    #[Route('/', name: 'index')]
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

        // 🔍 recherche
        if ($q) {
            $qb->andWhere('a.contenu LIKE :q')
               ->setParameter('q', "%$q%");
        }

        // 📌 filtre statut
        if ($status) {
            $qb->andWhere('a.statut = :status')
               ->setParameter('status', $status);
        }

        // 🔐 sécuriser tri
        $allowedSorts = ['id', 'contenu', 'date_post', 'statut'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        $direction = strtolower($direction) === 'desc' ? 'DESC' : 'ASC';

        $qb->orderBy("a.$sort", $direction)
           ->setFirstResult($offset)
           ->setMaxResults($limit);

        $articles = $qb->getQuery()->getResult();

        // 📊 total optimisé
        $total = $repo->createQueryBuilder('a')
            ->select('COUNT(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $pages = ceil($total / $limit);

        // ⚡ AJAX
        if ($request->isXmlHttpRequest()) {
            return $this->render('admin/template/admin_article/_table.html.twig', [
                'articles' => $articles,
                'pages' => $pages
            ]);
        }

        return $this->render('admin/template/admin_article/index.html.twig', [
            'articles' => $articles,
            'pages' => $pages
        ]);
    }

    // 📊 statistiques
    #[Route('/stats', name: 'stats')]
    public function stats(ArticleRepository $repo): Response
    {
        return $this->json([
            'total' => $repo->count([]),
            'valide' => $repo->count(['statut' => 'valide']),
            'attente' => $repo->count(['statut' => 'en_attente']),
            'refuse' => $repo->count(['statut' => 'refuse']),
        ]);
    }

    // ❌ supprimer
    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $em->remove($article);
            $em->flush();

            $this->addFlash('success', 'Article supprimé ❌');
        }

        return $this->redirectToRoute('admin_article_index');
    }

    // ✏️ modifier
    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Request $request, Article $article, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Article modifié ✅');

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/template/admin_article/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

    // ✅ valider
    #[Route('/{id}/valider', name: 'valider')]
    public function valider(Article $article, EntityManagerInterface $em): Response
    {
        $article->setStatut('valide');
        $em->flush();

        return $this->redirectToRoute('admin_article_index');
    }

    // ❌ refuser
    #[Route('/{id}/refuser', name: 'refuser')]
    public function refuser(Article $article, EntityManagerInterface $em): Response
    {
        $article->setStatut('refuse');
        $em->flush();

        return $this->redirectToRoute('admin_article_index');
    }

    // ➕ ajouter
    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );

                $article->setImage($newFilename);
            }

            $article->setStatut('en_attente');
            $imageFile = $form->get('imageFile')->getData();

if ($imageFile) {
    $newFilename = uniqid().'.'.$imageFile->guessExtension();

    $imageFile->move(
        $this->getParameter('uploads_directory'),
        $newFilename
    );

    $evenement->setImage($newFilename);
}

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Article ajouté ✅');

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->renderForm('admin/template/admin_article/new.html.twig', [
            'form' => $form,
        ]);
    }
}