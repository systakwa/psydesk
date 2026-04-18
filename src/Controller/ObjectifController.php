<?php

namespace App\Controller;

use App\Entity\Objectif;
use App\Form\ObjectifType;
use App\Repository\ObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/objectif')]
final class ObjectifController extends AbstractController
{
    #[Route(name: 'app_objectif_index', methods: ['GET'])]
    public function index(ObjectifRepository $objectifRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $objectifs = $objectifRepository->findBy(['idPatient' => $user]);

        return $this->render('objectif/index.html.twig', [
            'objectifs' => $objectifs,
        ]);
    }

    /*
    #[Route('/new', name: 'app_objectif_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $objectif = new Objectif();
        $objectif->setIdPatient($user);

        $form = $this->createForm(ObjectifType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($objectif);
            $entityManager->flush();

            return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('objectif/new.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }*/
        #[Route('/new-modal', name: 'app_objectif_new_modal', methods: ['GET'])]
public function newModal(): Response
{
    $user = $this->getUser();
    if (!$user) {
        return $this->redirectToRoute('app_login');
    }

    $objectif = new Objectif();
    $objectif->setIdPatient($user);
    $form = $this->createForm(ObjectifType::class, $objectif);

    return $this->render('objectif/_form_modal.html.twig', [
        'form' => $form->createView(),
    ]);
}

#[Route('/new', name: 'app_objectif_new', methods: ['POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    if (!$user) {
        return $this->redirectToRoute('app_login');
    }

    $objectif = new Objectif();
    $objectif->setIdPatient($user);

    $form = $this->createForm(ObjectifType::class, $objectif);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($objectif);
        $entityManager->flush();

        if ($request->isXmlHttpRequest()) {
            // Retourner un JSON pour la soumission AJAX
            return new JsonResponse(['success' => true, 'id' => $objectif->getId()]);
        }

        return $this->redirectToRoute('app_objectif_index');
    }

    if ($request->isXmlHttpRequest()) {
        // Rendre le formulaire avec les erreurs
        $html = $this->renderView('objectif/_form_modal.html.twig', [
            'form' => $form->createView(),
        ]);
        return new JsonResponse(['success' => false, 'html' => $html]);
    }

    return $this->render('objectif/new.html.twig', [
        'objectif' => $objectif,
        'form' => $form,
    ]);
}

    #[Route('/{id}', name: 'app_objectif_show', methods: ['GET'])]
    public function show(Objectif $objectif): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        // Vérifier que l'objectif appartient bien à l'utilisateur
        if ($objectif->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Cet objectif ne vous appartient pas.');
        }
        return $this->render('objectif/show.html.twig', [
            'objectif' => $objectif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_objectif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Objectif $objectif, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        if ($objectif->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Cet objectif ne vous appartient pas.');
        }

        $form = $this->createForm(ObjectifType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('objectif/edit.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objectif_delete', methods: ['POST'])]
    public function delete(Request $request, Objectif $objectif, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        if ($objectif->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Cet objectif ne vous appartient pas.');
        }

        if ($this->isCsrfTokenValid('delete'.$objectif->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($objectif);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
    }
}