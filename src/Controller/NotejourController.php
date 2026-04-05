<?php

namespace App\Controller;

use App\Entity\Notejour;
use App\Form\NotejourType;
use App\Repository\NotejourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/notejour')]
final class NotejourController extends AbstractController
{
    #[Route(name: 'app_notejour_index', methods: ['GET'])]
    public function index(NotejourRepository $notejourRepository): Response
    {
        return $this->render('notejour/index.html.twig', [
            'notejours' => $notejourRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_notejour_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $notejour = new Notejour();
        $form = $this->createForm(NotejourType::class, $notejour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($notejour);
            $entityManager->flush();

            return $this->redirectToRoute('app_notejour_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notejour/new.html.twig', [
            'notejour' => $notejour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_notejour_show', methods: ['GET'])]
    public function show(Notejour $notejour): Response
    {
        return $this->render('notejour/show.html.twig', [
            'notejour' => $notejour,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_notejour_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Notejour $notejour, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NotejourType::class, $notejour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_notejour_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notejour/edit.html.twig', [
            'notejour' => $notejour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_notejour_delete', methods: ['POST'])]
    public function delete(Request $request, Notejour $notejour, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$notejour->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($notejour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_notejour_index', [], Response::HTTP_SEE_OTHER);
    }
}
