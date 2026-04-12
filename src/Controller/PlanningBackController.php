<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/planning/back')]
final class PlanningBackController extends AbstractController
{
    #[Route(name: 'app_planning_back_index', methods: ['GET', 'POST'])]
    public function index(PlanningRepository $planningRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search', '');

        $query = $planningRepository->createQueryBuilder('p')
            ->leftJoin('p.psychologue', 'psy');

        // Filter by current psychologue if user is ROLE_PSYCHOLOGUE
        $user = $this->getUser();
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('p.psychologue = :psychologue')
                ->setParameter('psychologue', $user);
        }

        if ($search) {
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $query->andWhere('p.jour LIKE :search');
            } else {
                $query->andWhere('psy.nom LIKE :search OR psy.prenom LIKE :search OR p.jour LIKE :search OR psy.email LIKE :search');
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

        return $this->render('planning_back/index.html.twig', [
            'plannings' => $pagination,
            'search' => $search,
        ]);
    }

    #[Route('/new', name: 'app_planning_back_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $planning = new Planning();
        $user = $this->getUser();

        // Auto-set psychologue for ROLE_PSYCHOLOGUE
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $planning->setPsychologue($user);
        }

        $form = $this->createForm(PlanningType::class, $planning, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue is set for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $planning->setPsychologue($user);
            }
            $entityManager->persist($planning);
            $entityManager->flush();

            return $this->redirectToRoute('app_planning_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planning_back/new.html.twig', [
            'planning' => $planning,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_planning_back_show', methods: ['GET'])]
    public function show(Planning $planning): Response
    {
        return $this->render('planning_back/show.html.twig', [
            'planning' => $planning,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_planning_back_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Planning $planning, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(PlanningType::class, $planning, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue cannot be changed for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $planning->setPsychologue($user);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_planning_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('planning_back/edit.html.twig', [
            'planning' => $planning,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_planning_back_delete', methods: ['POST'])]
    public function delete(Request $request, Planning $planning, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planning->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($planning);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_planning_back_index', [], Response::HTTP_SEE_OTHER);
    }
}
