<?php

namespace App\Controller\front;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/front/event')]
class EventController extends AbstractController
{
    #[Route('/', name: 'app_event_index', methods: ['GET'])]
public function index(Request $request, EvenementRepository $repo): Response
{
    $q = $request->query->get('q');
    $sort = $request->query->get('sort', 'date');

    $query = $repo->createQueryBuilder('e')
        //  ken event validé yben 
        ->where('e.statut = :s')
        ->setParameter('s', 'valide');

    // 🔍 recherche
    if ($q) {
        $query->andWhere('e.titre LIKE :q OR e.lieu LIKE :q')
              ->setParameter('q', '%'.$q.'%');
    }

    // 🔃 tri
    if ($sort === 'date') {
        $query->orderBy('e.dateEvent', 'ASC');
    } elseif ($sort === 'titre') {
        $query->orderBy('e.titre', 'ASC');
    }

    $evenements = $query->getQuery()->getResult();

    return $this->render('front/event/index.html.twig', [
        'evenements' => $evenements,
    ]);
}
#[Route('/calendar', name: 'admin_event_calendar')]
public function calendar(EvenementRepository $repo): Response
{
    $events = $repo->findAll();

    $data = [];

    foreach ($events as $event) {
        $data[] = [
            'title' => $event->getTitre(),
            'start' => $event->getDateEvent()->format('Y-m-d'),
            'id' => $event->getId(), // 🔥 IMPORTANT
        ];
    }

    return $this->json($data);
}
    #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, EvenementRepository $repo): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
dd('OK');
            //titre m3awedch ykoun déjà utilisé
            $existing = $repo->findOneBy(['titre' => $evenement->getTitre()]);
            if ($existing) {
                $this->addFlash('error', 'Titre déjà utilisé ❌');
                return $this->redirectToRoute('app_event_new');
            }
// 🔥 Générer lien Meet automatiquement
$code = substr(md5(uniqid()), 0, 10);

$meetLink = "https://meet.jit.si/" . $code;

$evenement->setMeetLink($meetLink);
$imageFile = $form->get('imageFile')->getData();

if ($imageFile) {

    $newFilename = uniqid().'.'.$imageFile->guessExtension();

    $imageFile->move(
        $this->getParameter('uploads_directory'),
        $newFilename
    );

    $evenement->setImage($newFilename);
}


            $entityManager->persist($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Event ajouté ✅');

            return $this->redirectToRoute('app_event_index');
        }

        return $this->renderForm('front/event/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_show', methods: ['GET'])]
    public function show(Evenement $evenement, EvenementRepository $repo): Response
    {
        // 📊 statistique simple
        $count = count($evenement->getParticipations());

        return $this->render('front/event/show.html.twig', [
            'evenement' => $evenement,
            'count' => $count,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_event_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Event modifié ✅');

            return $this->redirectToRoute('app_event_index');
        }

        return $this->renderForm('front/event/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_delete', methods: ['POST'])]
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Event supprimé ❌');
        }

        return $this->redirectToRoute('app_event_index');
    }
}