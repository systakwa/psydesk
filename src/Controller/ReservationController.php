<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Fiche;

use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;


#[Route('/reservation')]
final class ReservationController extends AbstractController
{
    #[Route(name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    #[Route('/patient_reservation', name: 'patient_reservation_list')]
    public function list(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $reservations = $em->getRepository(Reservation::class)
            ->findBy(['patient' => $user]);

        return $this->render('reservation/patient_list.html.twig', [
            'reservations' => $reservations
        ]);
    }

    #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('patient_reservation_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('patient_reservation_list', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/reservation/add', name: 'reservation_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $reservation = new Reservation();

        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // automatically add patient
            $reservation->setPatient($this->getUser());

            // optional default status
            $reservation->setStatus('en cours');

            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('patient_reservation_list');
        }

        return $this->render('reservation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/reservation/{id}/cancel', name: 'reservation_cancel')]
        public function cancel(Reservation $reservation, EntityManagerInterface $em): Response
        {
            // only allow cancel if status is still pending
            if ($reservation->getStatus() === 'pending') {
                $em->remove($reservation);
                $em->flush();
            }

            $roles = $this->getUser()->getRoles();

            return $this->redirectToRoute('patient_reservation_list');

        }

        #[Route('/reservation/{id}/cancelPsychologue', name: 'reservation_cancel_psychologue')]
        public function cancelPsychologue(Reservation $reservation, EntityManagerInterface $em): Response
        {
           
            // only allow cancel if status is still pending
            $em->remove($reservation);
            $em->flush();
            

            return $this->redirectToRoute('psychologue_reservations');
        }


        #[Route('/psychologue/reservations', name: 'psychologue_reservations')]
        public function reservationsListPsychologue(ReservationRepository $reservationRepository): Response
        {
            $user = $this->getUser();

            $reservations = $reservationRepository->findByPsychologue($user);

            return $this->render('reservation/psychologue_list.html.twig', [
                'reservations' => $reservations,
            ]);
        }

        #[Route('/psychologue/reservation/{id}/edit', name: 'psychologue_reservation_edit')]
public function editForPsychologue(
    Request $request,
    Reservation $reservation,
    EntityManagerInterface $em
): Response
{
    $user = $this->getUser();

    // Protection : seul le psychologue concerné peut accéder
    if ($reservation->getPsychologue() !== $user) {
        throw $this->createAccessDeniedException();
    }

    // Vérifier si la réservation a déjà une fiche
    $fiche = $reservation->getFiche();
    if (!$fiche) {
        $fiche = new Fiche();
        $fiche->setReservation($reservation);
        $fiche->setDate(new \DateTime()); // date automatique
        $reservation->setFiche($fiche);
        $em->persist($fiche);
    }

    // Créer un form pour la fiche et la date_dispo
    $form = $this->createFormBuilder($reservation)
        ->add('date_dispo', DateTimeType::class, [
            'label' => 'Date disponible',
            'widget' => 'single_text',
            'attr' => ['class' => 'form-control'],
        ])
        ->add('texteFiche', TextareaType::class, [
            'label' => 'Fiche de consultation',
            'data' => $fiche->getTexteFiche(),
            'mapped' => false, // on le map manuellement
            'required' => false,
            'constraints' => [
                new Assert\Length([
                    'min' => 5,
                    'minMessage' => 'Le texte de la fiche doit contenir au moins {{ limit }} caractères.',
                ]),
            ],
            'attr' => ['class' => 'form-control', 'rows' => 5]
        ])
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        // Mettre à jour le texte de la fiche
        $fiche->setTexteFiche($form->get('texteFiche')->getData());

        // Mettre le status en confirmer
        $reservation->setStatus('confirmer');

        $em->flush();

        $this->addFlash('success', 'Reservation confirmée et fiche mise à jour.');

        return $this->redirectToRoute('psychologue_reservations');
    }

    return $this->render('reservation/edit_psychologue.html.twig', [
        'form' => $form->createView(),
        'reservation' => $reservation,
    ]);
}
}
