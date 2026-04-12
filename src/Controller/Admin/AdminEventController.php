<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/event')]
class AdminEventController extends AbstractController
{
    #[Route('/', name: 'admin_event_index')]
    public function index(Request $request, EvenementRepository $repo): Response
    {
        $q = $request->query->get('q');
        $status = $request->query->get('status');
        $sort = $request->query->get('sort', 'dateEvent');
        $direction = $request->query->get('direction', 'asc');
        $page = max(1, $request->query->getInt('page', 1));

        $limit = 3;
        $offset = ($page - 1) * $limit;

        $qb = $repo->createQueryBuilder('e');

        // 🔍 recherche
        if ($q) {
            $qb->andWhere('e.titre LIKE :q OR e.lieu LIKE :q')
               ->setParameter('q', "%$q%");
        }

        // 🎯 filtre statut
        if ($status) {
            $qb->andWhere('e.statut = :status')
               ->setParameter('status', $status);
        }

        // 🔄 tri sécurisé
        $allowedSorts = ['titre', 'dateEvent', 'statut'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'dateEvent';
        }

        $qb->orderBy("e.$sort", $direction)
           ->setFirstResult($offset)
           ->setMaxResults($limit);

        $evenements = $qb->getQuery()->getResult();

        // 🔢 pagination propre
        $total = $repo->createQueryBuilder('e')
            ->select('COUNT(e.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $pages = ceil($total / $limit);

        // ⚡ AJAX → seulement la table
        if ($request->isXmlHttpRequest()) {
            return $this->render('admin/template/admin_event/_table.html.twig', [
                'evenements' => $evenements,
                'pages' => $pages
            ]);
        }

        return $this->render('admin/template/admin_event/index.html.twig', [
            'evenements' => $evenements,
            'pages' => $pages
        ]);
    }

    #[Route('/new', name: 'admin_event_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $evenement->setStatut('en_attente');

            $em->persist($evenement);
            $em->flush();

            $this->addFlash('success', 'Event ajouté ✅');

            return $this->redirectToRoute('admin_event_index');
        }

        return $this->renderForm('admin/template/admin_event/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'admin_event_show')]
    public function show(Evenement $evenement): Response
    {
        return $this->render('admin/template/admin_event/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_event_edit')]
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Event modifié ✏️');

            return $this->redirectToRoute('admin_event_index');
        }

        return $this->renderForm('admin/template/admin_event/edit.html.twig', [
            'form' => $form,
            'evenement' => $evenement,
        ]);
    }
#[Route('/stats', name: 'admin_event_stats')]
public function stats(EvenementRepository $repo): Response
{
    return $this->json([
        'total' => $repo->count([]),
        'valide' => $repo->count(['statut' => 'validé']),
        'attente' => $repo->count(['statut' => 'en_attente']),
        'refuse' => $repo->count(['statut' => 'refusé']),
    ]);
}
    #[Route('/delete/{id}', name: 'admin_event_delete', methods: ['POST'])]
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $em->remove($evenement);
            $em->flush();

            $this->addFlash('success', 'Event supprimé ❌');
        }

        return $this->redirectToRoute('admin_event_index');
    }
}