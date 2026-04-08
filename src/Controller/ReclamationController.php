<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reclamation')]
final class ReclamationController extends AbstractController
{
    
    #[Route(name: 'app_reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $reclamations = $reclamationRepository->findBy(['idPatient' => $user]);

        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/admin/all', name: 'app_reclamation_admin_all', methods: ['GET'])]
    public function indexAll(ReclamationRepository $reclamationRepository): Response
    {
        $reclamations = $reclamationRepository->findAll();
        return $this->render('Objectif_reclamtion_back/reclamation.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/new-modal', name: 'app_reclamation_new_modal', methods: ['GET'])]
    public function newModal(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $reclamation = new Reclamation();
        $reclamation->setIdPatient($user);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        return $this->render('reclamation/_form_modal.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/new', name: 'app_reclamation_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $reclamation = new Reclamation();
        $reclamation->setIdPatient($user);

        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reclamation);
            $entityManager->flush();

            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => true]);
            }
            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('reclamation/_form_modal.html.twig', ['form' => $form->createView()]);
            return new JsonResponse(['success' => false, 'html' => $html]);
        }

        return $this->render('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_show', methods: ['GET'])]
    public function show(Reclamation $reclamation): Response
    {
        $user = $this->getUser();
        if (!$user || $reclamation->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user || $reclamation->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }

        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user || $reclamation->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }

        if ($this->isCsrfTokenValid('delete'.$reclamation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
}