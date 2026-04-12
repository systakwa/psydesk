<?php

namespace App\Controller;

use App\Entity\Fiche;
use App\Entity\Users;
use App\Form\FicheType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fiche/back')]
final class FicheBackController extends AbstractController
{
    #[Route(name: 'app_fiche_back_index', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search', '');

        $query = $entityManager->getRepository(Fiche::class)->createQueryBuilder('f')
            ->leftJoin('f.patient', 'p')
            ->leftJoin('f.psychologue', 'psy')
            ->leftJoin('f.reservation', 'r');

        // Filter by current psychologue if user is ROLE_PSYCHOLOGUE
        $user = $this->getUser();
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('f.psychologue = :psychologue')
                ->setParameter('psychologue', $user);
        }

        if ($search) {
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $query->andWhere('p.nom LIKE :search OR p.prenom LIKE :search OR p.email LIKE :search');
            } else {
                $query->andWhere('p.nom LIKE :search OR p.prenom LIKE :search OR psy.nom LIKE :search OR psy.prenom LIKE :search OR p.email LIKE :search');
            }
            $query->setParameter('search', '%' . $search . '%');
        }

        $query = $query->getQuery();

        // Paginate the results
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        // Build fiche data with related users
        $ficheData = [];
        foreach ($pagination->getItems() as $fiche) {
            $ficheData[$fiche->getId()] = [
                'patient' => $fiche->getPatient(),
                'psychologue' => $fiche->getPsychologue(),
                'reservation' => $fiche->getReservation(),
            ];
        }

        return $this->render('fiche_back/index.html.twig', [
            'fiches' => $pagination,
            'ficheData' => $ficheData,
            'search' => $search,
        ]);
    }

    #[Route('/new', name: 'app_fiche_back_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fiche = new Fiche();
        $user = $this->getUser();

        // Auto-set psychologue for ROLE_PSYCHOLOGUE
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $fiche->setPsychologue($user);
        }

        $form = $this->createForm(FicheType::class, $fiche, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue is set for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $fiche->setPsychologue($user);
            }
            $entityManager->persist($fiche);
            $entityManager->flush();

            return $this->redirectToRoute('app_fiche_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fiche_back/new.html.twig', [
            'fiche' => $fiche,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_back_show', methods: ['GET'])]
    public function show(Fiche $fiche, EntityManagerInterface $em): Response
    {
        return $this->render('fiche_back/show.html.twig', [
            'fiche' => $fiche,
            'patient' => $fiche->getPatient(),
            'psychologue' => $fiche->getPsychologue(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fiche_back_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fiche $fiche, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(FicheType::class, $fiche, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue cannot be changed for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $fiche->setPsychologue($user);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_fiche_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fiche_back/edit.html.twig', [
            'fiche' => $fiche,
            'patient' => $fiche->getPatient(),
            'psychologue' => $fiche->getPsychologue(),
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fiche_back_delete', methods: ['POST'])]
    public function delete(Request $request, Fiche $fiche, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fiche->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fiche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fiche_back_index', [], Response::HTTP_SEE_OTHER);
    }
}
