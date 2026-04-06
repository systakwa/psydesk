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
    #[Route('/', name: 'admin_event_index', methods: ['GET'])]
    public function index(Request $request, EvenementRepository $repo): Response
    {
        $q = $request->query->get('q');
        $sort = $request->query->get('sort', 'date');

        $query = $repo->createQueryBuilder('e');

        // 🔍 recherche
        if ($q) {
            $query->where('e.titre LIKE :q OR e.lieu LIKE :q')
                  ->setParameter('q', '%'.$q.'%');
        }

        // 🔃 tri
        if ($sort === 'date') {
            $query->orderBy('e.dateEvent', 'ASC');
        } elseif ($sort === 'titre') {
            $query->orderBy('e.titre', 'ASC');
        }

        $evenements = $query->getQuery()->getResult();

        return $this->render('admin/template/admin_event/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }

    #[Route('/new', name: 'admin_event_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // statut automatique
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

    #[Route('/{id}', name: 'admin_event_show', methods: ['GET'])]
    public function show(Evenement $evenement): Response
    {
        return $this->render('admin/template/admin_event/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_event_edit', methods: ['GET', 'POST'])]
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

    #[Route('/{id}', name: 'admin_event_delete', methods: ['POST'])]
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