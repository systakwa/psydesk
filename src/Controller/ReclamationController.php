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
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;




#[Route('/reclamation')]
final class ReclamationController extends AbstractController
{
    #[Route(name: 'app_reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        $user = $this->getUser();
        if (!$user) return $this->redirectToRoute('app_login');
        $reclamations = $reclamationRepository->findBy(['idPatient' => $user]);
        return $this->render('reclamation/index.html.twig', ['reclamations' => $reclamations]);
    }

    #[Route('/admin/all', name: 'app_reclamation_admin_all', methods: ['GET'])]
    public function indexAll(ReclamationRepository $reclamationRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('Objectif_reclamtion_back/reclamation.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }

    #[Route('/new-modal', name: 'app_reclamation_new_modal', methods: ['GET'])]
    public function newModal(): Response
    {
        $user = $this->getUser();
        if (!$user) return $this->redirectToRoute('app_login');
        $reclamation = new Reclamation();
        $reclamation->setIdPatient($user);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        return $this->render('reclamation/_form_modal.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/new', name: 'app_reclamation_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) return $this->redirectToRoute('app_login');

        $reclamation = new Reclamation();
        $reclamation->setIdPatient($user);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reclamation);
            $entityManager->flush();
            return $request->isXmlHttpRequest() 
                ? new JsonResponse(['success' => true])
                : $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
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
        if (!$user) return $this->redirectToRoute('app_login');
        if (!in_array('ROLE_ADMIN', $user->getRoles()) && $reclamation->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }
        return $this->render('reclamation/show.html.twig', ['reclamation' => $reclamation]);
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

    // Suppression autorisée à l'admin OU au patient propriétaire
    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) return $this->redirectToRoute('app_login');
        $isAdmin = in_array('ROLE_ADMIN', $user->getRoles());
        if (!$isAdmin && $reclamation->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }

        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
            $this->addFlash('success', 'Réclamation supprimée avec succès.');
        }
        return $isAdmin 
            ? $this->redirectToRoute('app_reclamation_admin_all', [], Response::HTTP_SEE_OTHER)
            : $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
/*
    // Réponse uniquement pour l'admin
    #[Route('/{id}/repondre', name: 'app_reclamation_repondre', methods: ['POST'])]
    public function repondre(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $reponse = $request->request->get('reponse');
        if ($reponse) {
            $reclamation->setReponse($reponse);
            $em->flush();
            return $request->isXmlHttpRequest()
                ? new JsonResponse(['success' => true])
                : $this->redirectToRoute('app_reclamation_admin_all');
        }
        return $request->isXmlHttpRequest()
            ? new JsonResponse(['success' => false, 'error' => 'La réponse ne peut pas être vide.'])
            : $this->redirectToRoute('app_reclamation_admin_all');
    }*/

#[Route('/{id}/repondre-modal', name: 'app_reclamation_repondre_modal', methods: ['GET'])]
public function repondreModal(Reclamation $reclamation): Response
{
    // Vérifier que l'utilisateur est admin
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    return $this->render('reclamation/_repondre_modal.html.twig', [
        'reclamation' => $reclamation,
    ]);
}

#[Route('/{id}/repondre', name: 'app_reclamation_repondre', methods: ['POST'])]
public function repondre(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    $reponse = $request->request->get('reponse');
    if ($reponse) {
        $reclamation->setReponse($reponse);
        $em->flush();
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true]);
        }
        $this->addFlash('success', 'Réponse ajoutée avec succès.');
        return $this->redirectToRoute('app_reclamation_admin_all');
    }
    if ($request->isXmlHttpRequest()) {
        return new JsonResponse(['success' => false, 'error' => 'La réponse ne peut pas être vide.']);
    }
    $this->addFlash('error', 'La réponse ne peut pas être vide.');
    return $this->redirectToRoute('app_reclamation_admin_all');
}

#[Route('/admin/search-ajax', name: 'app_reclamation_search_ajax', methods: ['GET'])]
public function searchAjax(Request $request, ReclamationRepository $reclamationRepository, CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    
    try {
        $term = $request->query->get('term', '');
        
        if (strlen($term) < 2) {
            $reclamations = $reclamationRepository->findAll();
        } else {
            $reclamations = $reclamationRepository->searchByTerm($term);
        }
        
        $data = [];
        foreach ($reclamations as $rec) {
            $patient = $rec->getIdPatient();
            $estTraite = !empty($rec->getReponse());
            
            $data[] = [
                'id' => $rec->getId(),
                'description' => $rec->getDescription(),
                'date' => $rec->getDate() ? $rec->getDate()->format('Y-m-d') : '',
                'patientNom' => $patient ? $patient->getNom() : '',
                'patientPrenom' => $patient ? $patient->getPrenom() : '',
                'patientEmail' => $patient ? $patient->getEmail() : '',
                'estTraite' => $estTraite,
                'reponse' => $rec->getReponse(),
                'deleteToken' => $csrfTokenManager->getToken('delete' . $rec->getId())->getValue(),
                'urlTraiter' => $this->generateUrl('app_reclamation_repondre', ['id' => $rec->getId()]),
                'urlDelete' => $this->generateUrl('app_reclamation_delete', ['id' => $rec->getId()]),
                'urlShow' => $this->generateUrl('app_reclamation_show', ['id' => $rec->getId()]),
            ];
        }
        
        return $this->json($data);
        
    } catch (\Throwable $e) {
        // Log l'erreur
        return $this->json(['error' => $e->getMessage()], 500);
    }
}    
}