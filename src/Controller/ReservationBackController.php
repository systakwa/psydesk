<?php

namespace App\Controller;

use App\Entity\Disponibilite;
use App\Entity\Reservation;
use App\Entity\Users;
use App\Form\Reservation1Type;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/reservation/back')]
final class ReservationBackController extends AbstractController
{
    #[Route(name: 'app_reservation_back_index', methods: ['GET', 'POST'])]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search', '');
        $status = $request->request->get('status', '');

        $query = $entityManager->getRepository(Reservation::class)->createQueryBuilder('r')
            ->leftJoin('r.patient', 'p')
            ->leftJoin('r.psychologue', 'psy');

        // Filter by current psychologue if user is ROLE_PSYCHOLOGUE
        $user = $this->getUser();
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('r.psychologue = :psychologue')
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

        if ($status) {
            $query->andWhere('r.status = :status')
                ->setParameter('status', $status);
        }

        $query = $query->getQuery();

        // Paginate the results
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        // Build reservation data with related users
        $reservationData = [];
        foreach ($pagination->getItems() as $res) {
            $reservationData[$res->getId()] = [
                'patient' => $res->getPatient(),
                'psychologue' => $res->getPsychologue(),
            ];
        }

        return $this->render('reservation_back/index.html.twig', [
            'reservations' => $pagination,
            'reservationData' => $reservationData,
            'search' => $search,
        ]);
    }

    #[Route('/accept/{id}', name: 'app_reservation_back_accept', methods: ['POST'])]
    public function accept(Reservation $reservation, Request $request, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('accept'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('app_reservation_back_index');
        }

        // Update reservation status
        $reservation->setStatus('confirmé');
        $em->flush();

        // Create Disponibilite record to mark the slot as reserved
        $dispo = $em->getRepository(Disponibilite::class)->findOneBy([
            'psychologue' => $reservation->getPsychologue(),
            'dateHeure' => $reservation->getDatePrevue(),
        ]);

        if (!$dispo) {
            $psychologue = $reservation->getPsychologue();
            $planning = $em->getRepository(\App\Entity\Planning::class)->findOneBy(['psychologue' => $psychologue]);

            if ($psychologue && $planning) {
                $dispo = new Disponibilite();
                $dispo->setPsychologue($psychologue);
                $dispo->setPlanning($planning);
                $dispo->setDateHeure($reservation->getDatePrevue());
                $dispo->setIsReserved(true);
                $em->persist($dispo);
                $em->flush();
            }
        } else {
            $dispo->setIsReserved(true);
            $em->flush();
        }

        // Send acceptance email
        $this->sendAcceptanceEmail($reservation, $em);

        $this->addFlash('success', 'Réservation acceptée et email envoyé.');
        return $this->redirectToRoute('app_reservation_back_index');
    }

    #[Route('/refuse/{id}', name: 'app_reservation_back_refuse', methods: ['POST'])]
    public function refuse(Reservation $reservation, Request $request, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('refuse'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('app_reservation_back_index');
        }

        // Update reservation status
        $reservation->setStatus('annulé');
        $em->flush();

        // Remove Disponibilite if it was marked as reserved
        $psychologue = $reservation->getPsychologue();
        $dispo = $em->getRepository(Disponibilite::class)->findOneBy([
            'psychologue' => $psychologue,
            'dateHeure' => $reservation->getDatePrevue(),
            'isReserved' => true,
        ]);

        if ($dispo) {
            $em->remove($dispo);
            $em->flush();
        }

        // Send refusal email
        $this->sendRefusalEmail($reservation, $em);

        $this->addFlash('success', 'Réservation refusée et email envoyé.');
        return $this->redirectToRoute('app_reservation_back_index');
    }

    #[Route('/new', name: 'app_reservation_back_new', methods: ['GET', 'POST'])]
    #[Route('/new', name: 'app_reservation_back_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $user = $this->getUser();

        // Auto-set psychologue for ROLE_PSYCHOLOGUE
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $reservation->setPsychologue($user);
        }

        $form = $this->createForm(Reservation1Type::class, $reservation, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue is set for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $reservation->setPsychologue($user);
            }
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation_back/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_back_show', methods: ['GET'])]
    public function show(Reservation $reservation, EntityManagerInterface $em): Response
    {
        return $this->render('reservation_back/show.html.twig', [
            'reservation' => $reservation,
            'patient' => $reservation->getPatient(),
            'psychologue' => $reservation->getPsychologue(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservation_back_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(Reservation1Type::class, $reservation, [
            'user' => $user,
            'isPhychologue' => $this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ensure psychologue cannot be changed for ROLE_PSYCHOLOGUE
            if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
                $reservation->setPsychologue($user);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_back_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation_back/edit.html.twig', [
            'reservation' => $reservation,
            'patient' => $reservation->getPatient(),
            'psychologue' => $reservation->getPsychologue(),
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_back_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_back_index', [], Response::HTTP_SEE_OTHER);
    }

    private function sendAcceptanceEmail(Reservation $reservation, EntityManagerInterface $em): void
    {
        $patient = $reservation->getPatient();
        $psychologue = $reservation->getPsychologue();

        if (!$patient || !$psychologue) return;

        $dateFormatted = $reservation->getDatePrevue()->format('d/m/Y');
        $heureFormatted = $reservation->getDatePrevue()->format('H:i');
        $patientNom = $patient->getPrenom() . ' ' . $patient->getNom();
        $psyNom = 'Dr. ' . $psychologue->getPrenom() . ' ' . $psychologue->getNom();

        $htmlContent = "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Confirmation de votre rendez-vous — PsyDesk</title>
</head>
<body style='margin:0;padding:0;background-color:#f0f4f8;font-family:Georgia,serif;'>
    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f0f4f8;padding:40px 20px;'>
        <tr><td align='center'>
            <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.12);'>
                <tr>
                    <td style='background:linear-gradient(135deg,#2d6a9f 0%,#1a4a7a 50%,#0d2d4f 100%);padding:48px 40px;text-align:center;'>
                        <h1 style='margin:0;color:#ffffff;font-size:28px;font-weight:normal;letter-spacing:3px;text-transform:uppercase;font-family:Georgia,serif;'>PsyDesk</h1>
                    </td>
                </tr>
                <tr>
                    <td style='background:linear-gradient(90deg,#27ae60,#2ecc71);padding:20px 40px;text-align:center;'>
                        <p style='margin:0;color:#ffffff;font-size:16px;font-weight:bold;'>✅ &nbsp; RENDEZ-VOUS CONFIRMÉ</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:48px 40px;'>
                        <h2 style='margin:0 0 16px;color:#1a2e44;font-size:22px;'>Bonjour <strong>$patientNom</strong>,</h2>
                        <p style='margin:0;color:#4a5568;font-size:16px;line-height:1.8;'>Votre psychologue a confirmé votre rendez-vous.</p>
                    </td>
                </tr>
                <tr><td style='padding:32px 40px;'>
                    <table width='100%' cellpadding='0' cellspacing='0' style='background:#f7faff;border:2px solid #27ae60;border-radius:12px;'>
                        <tr><td style='padding:24px;border-bottom:1px solid #e2ecf8;'>
                            <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Psychologue</p>
                            <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$psyNom</p>
                        </td></tr>
                        <tr><td style='padding:24px;border-bottom:1px solid #e2ecf8;'>
                            <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Date</p>
                            <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$dateFormatted</p>
                        </td></tr>
                        <tr><td style='padding:24px;'>
                            <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Heure</p>
                            <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$heureFormatted</p>
                        </td></tr>
                    </table>
                </td></tr>
                <tr><td style='padding:40px;text-align:center;border-top:1px solid #e2ecf8;'>
                    <p style='margin:0;color:#718096;font-size:12px;'>© 2026 PsyDesk — Plateforme de gestion pour psychologues et patients.</p>
                </td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
";

        try {
            $transport = Transport::fromDsn('smtp://tester44.tester2@gmail.com:hpevdqbvclzebhxa@smtp.gmail.com:587');
            $mailer = new Mailer($transport);
            $email = (new Email())
                ->from('noreply@psydesk.com')
                ->to($patient->getEmail())
                ->subject('✅ Votre rendez-vous a été confirmé — PsyDesk')
                ->html($htmlContent);
            $mailer->send($email);
        } catch (\Exception $e) {
            // Log error silently
        }
    }

    private function sendRefusalEmail(Reservation $reservation, EntityManagerInterface $em): void
    {
        $patient = $reservation->getPatient();
        $psychologue = $reservation->getPsychologue();

        if (!$patient || !$psychologue) return;

        $dateFormatted = $reservation->getDatePrevue()->format('d/m/Y');
        $heureFormatted = $reservation->getDatePrevue()->format('H:i');
        $patientNom = $patient->getPrenom() . ' ' . $patient->getNom();
        $psyNom = 'Dr. ' . $psychologue->getPrenom() . ' ' . $psychologue->getNom();

        $htmlContent = "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Rendez-vous annulé — PsyDesk</title>
</head>
<body style='margin:0;padding:0;background-color:#f0f4f8;font-family:Georgia,serif;'>
    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f0f4f8;padding:40px 20px;'>
        <tr><td align='center'>
            <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.12);'>
                <tr>
                    <td style='background:linear-gradient(135deg,#2d6a9f 0%,#1a4a7a 50%,#0d2d4f 100%);padding:48px 40px;text-align:center;'>
                        <h1 style='margin:0;color:#ffffff;font-size:28px;font-weight:normal;letter-spacing:3px;text-transform:uppercase;font-family:Georgia,serif;'>PsyDesk</h1>
                    </td>
                </tr>
                <tr>
                    <td style='background:linear-gradient(90deg,#e74c3c,#e67e22);padding:20px 40px;text-align:center;'>
                        <p style='margin:0;color:#ffffff;font-size:16px;font-weight:bold;'>❌ &nbsp; RENDEZ-VOUS ANNULÉ</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:48px 40px;'>
                        <h2 style='margin:0 0 16px;color:#1a2e44;font-size:22px;'>Bonjour <strong>$patientNom</strong>,</h2>
                        <p style='margin:0;color:#4a5568;font-size:16px;line-height:1.8;'>Malheureusement, votre psychologue ne peut pas honorer ce rendez-vous à cette date et heure.</p>
                    </td>
                </tr>
                <tr><td style='padding:32px 40px;'>
                    <table width='100%' cellpadding='0' cellspacing='0' style='background:#fff5f5;border:2px solid #e74c3c;border-radius:12px;'>
                        <tr><td style='padding:24px;border-bottom:1px solid #facbc9;'>
                            <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Psychologue</p>
                            <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$psyNom</p>
                        </td></tr>
                        <tr><td style='padding:24px;'>
                            <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Date/Heure annulée</p>
                            <p style='margin:4px 0 0;font-size:18px;color:#e74c3c;font-weight:bold;'>$dateFormatted à $heureFormatted</p>
                        </td></tr>
                    </table>
                </td></tr>
                <tr><td style='padding:32px 40px;text-align:center;'>
                    <p style='margin:0 0 16px;color:#4a5568;font-size:14px;'>Vous pouvez prendre rendez-vous à une autre date disponible.</p>
                    <a href='http://localhost:8000/reservation/front' style='display:inline-block;background:#0d6efd;color:#ffffff;text-decoration:none;padding:12px 30px;border-radius:6px;font-weight:bold;'>📅 Autre rendez-vous</a>
                </td></tr>
                <tr><td style='padding:40px;text-align:center;border-top:1px solid #e2ecf8;'>
                    <p style='margin:0;color:#718096;font-size:12px;'>© 2026 PsyDesk — Plateforme de gestion pour psychologues et patients.</p>
                </td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
";

        try {
            $transport = Transport::fromDsn('smtp://tester44.tester2@gmail.com:hpevdqbvclzebhxa@smtp.gmail.com:587');
            $mailer = new Mailer($transport);
            $email = (new Email())
                ->from('noreply@psydesk.com')
                ->to($patient->getEmail())
                ->subject('❌ Rendez-vous annulé — PsyDesk')
                ->html($htmlContent);
            $mailer->send($email);
        } catch (\Exception $e) {
            // Log error silently
        }
    }
}
