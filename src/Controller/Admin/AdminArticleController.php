<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/article')]
class AdminArticleController extends AbstractController
{
    #[Route('/', name: 'admin_article_index')]
    public function index(Request $request, ArticleRepository $repo)
    {
        $q = $request->query->get('q');
        $status = $request->query->get('status');

        $query = $repo->createQueryBuilder('a');

        if ($q) {
            $query->andWhere('a.contenu LIKE :q')
                  ->setParameter('q', '%'.$q.'%');
        }

        if ($status) {
            $query->andWhere('a.statut = :s')
                  ->setParameter('s', $status);
        }

        $articles = $query->getQuery()->getResult();

        return $this->render('admin/template/admin_article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
// ✏️ EDIT
#[Route('/{id}/edit', name: 'admin_article_edit')]
public function edit(Request $request, Article $article, EntityManagerInterface $em)
{
    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $em->flush();

        $this->addFlash('success', 'Article modifié ✏️');

        return $this->redirectToRoute('admin_article_index');
    }

    return $this->renderForm('admin/article/edit.html.twig', [
        'form' => $form,
        'article' => $article,
    ]);
}


#[Route('/{id}', name: 'admin_article_delete', methods: ['POST'])]
public function delete(Request $request, Article $article, EntityManagerInterface $em)
{
    if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
        $em->remove($article);
        $em->flush();

        $this->addFlash('success', 'Article supprimé ❌');
    }

    return $this->redirectToRoute('admin_article_index');
}


#[Route('/{id}/valider', name: 'admin_article_valider')]
public function valider(Article $article, EntityManagerInterface $em)
{
    $article->setStatut('validé');
    $em->flush();

    return $this->redirectToRoute('admin_article_index');
}

#[Route('/{id}/refuser', name: 'admin_article_refuser')]
public function refuser(Article $article, EntityManagerInterface $em)
{
    $article->setStatut('refusé');
    $em->flush();

    return $this->redirectToRoute('admin_article_index');
}
    #[Route('/new', name: 'admin_article_new')]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger)
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