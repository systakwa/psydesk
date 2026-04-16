<?php

namespace App\Controller;

use App\Entity\Notejour;
use App\Entity\Objectif;
use App\Form\NotejourType;
use App\Repository\NotejourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('/notejour')]
final class NotejourController extends AbstractController
{
    #[Route(name: 'app_notejour_index', methods: ['GET'])]
    public function index(NotejourRepository $notejourRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        // Récupérer les notes des objectifs de l'utilisateur
        $notejours = $notejourRepository->createQueryBuilder('n')
            ->join('n.idObjectif', 'o')
            ->where('o.idPatient = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        return $this->render('notejour/index.html.twig', [
            'notejours' => $notejours,
        ]);
    }

    

#[Route('/objectif/{objectif_id}', name: 'app_notejour_by_objectif', methods: ['GET'])]
public function indexByObjectif(int $objectif_id, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    if (!$user) {
        return $this->redirectToRoute('app_login');
    }
    $objectif = $entityManager->getRepository(Objectif::class)->find($objectif_id);
    if (!$objectif || $objectif->getIdPatient() !== $user) {
        throw $this->createAccessDeniedException('Objectif invalide ou non autorisé.');
    }
    $notejours = $objectif->getNotejours(); // collection des notes
    return $this->render('notejour/index.html.twig', [
        'notejours' => $notejours,
        'objectif' => $objectif,
    ]);
}

   /* #[Route('/new/{objectif_id?}', name: 'app_notejour_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ?int $objectif_id = null): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $notejour = new Notejour();

        if ($objectif_id) {
            $objectif = $entityManager->getRepository(Objectif::class)->find($objectif_id);
            if (!$objectif || $objectif->getIdPatient() !== $user) {
                throw $this->createAccessDeniedException('Objectif invalide ou non autorisé.');
            }
            $notejour->setIdObjectif($objectif);
        }

        $form = $this->createForm(NotejourType::class, $notejour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($notejour);
            $entityManager->flush();

            return $this->redirectToRoute('app_objectif_show', ['id' => $notejour->getIdObjectif()->getId()]);
        }

        return $this->render('notejour/new.html.twig', [
            'notejour' => $notejour,
            'form' => $form,
        ]);
    }*/
#[Route('/new-modal/{objectif_id}', name: 'app_notejour_new_modal', methods: ['GET'])]
public function newModal(int $objectif_id, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    if (!$user) {
        return $this->redirectToRoute('app_login');
    }
    $objectif = $entityManager->getRepository(Objectif::class)->find($objectif_id);
    if (!$objectif || $objectif->getIdPatient() !== $user) {
        throw $this->createAccessDeniedException('Objectif invalide ou non autorisé.');
    }
    $notejour = new Notejour();
    $notejour->setIdObjectif($objectif);
    $form = $this->createForm(NotejourType::class, $notejour);
    return $this->render('notejour/_form_modal.html.twig', [
        'form' => $form->createView(),
        'objectif_id' => $objectif_id, // ← passe l'ID à la vue
    ]);
}

#[Route('/new', name: 'app_notejour_new', methods: ['POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    if (!$user) {
        return $this->redirectToRoute('app_login');
    }

    $notejour = new Notejour();

    // Récupérer l'ID de l'objectif depuis le champ caché
    $objectifId = $request->request->get('objectif_id');
    if ($objectifId) {
        $objectif = $entityManager->getRepository(Objectif::class)->find($objectifId);
        if (!$objectif || $objectif->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Objectif invalide ou non autorisé.');
        }
        $notejour->setIdObjectif($objectif);
    }

    $form = $this->createForm(NotejourType::class, $notejour);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($notejour);
        $entityManager->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => true]);
        }
        return $this->redirectToRoute('app_objectif_show', ['id' => $notejour->getIdObjectif()->getId()]);
    }

    if ($request->isXmlHttpRequest()) {
        $html = $this->renderView('notejour/_form_modal.html.twig', [
            'form' => $form->createView(),
            'objectif_id' => $objectifId,
        ]);
        return new JsonResponse(['success' => false, 'html' => $html]);
    }

    return $this->render('notejour/new.html.twig', [
        'notejour' => $notejour,
        'form' => $form,
    ]);
}
        


    #[Route('/{id}/edit', name: 'app_notejour_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Notejour $notejour, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (!$user || $notejour->getIdObjectif()->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }

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
        $user = $this->getUser();
        if (!$user || $notejour->getIdObjectif()->getIdPatient() !== $user) {
            throw $this->createAccessDeniedException('Accès non autorisé.');
        }

        if ($this->isCsrfTokenValid('delete'.$notejour->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($notejour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_notejour_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/psy',name: 'app_note_psy', methods: ['GET'])]
    public function index_psy(NotejourRepository $notejourRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        // Récupérer les notes des objectifs de l'utilisateur
        $notejours = $notejourRepository->createQueryBuilder('n')
            ->join('n.idObjectif', 'o')
            ->where('o.idPatient = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        return $this->render('notejour/index_psy.html.twig', [
            'notejours' => $notejours,
        ]);
    }
}