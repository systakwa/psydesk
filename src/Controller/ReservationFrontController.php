<?php
namespace App\Controller;

use App\Entity\Disponibilite;
use App\Entity\Planning;
use App\Entity\Reservation;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpClient\HttpClient;

#[Route('/reservation/front')]
final class ReservationFrontController extends AbstractController
{
    /**
     * Step 1: List all psychologists with search/filter
     */
    #[Route(name: 'app_reservation_front_index', methods: ['GET', 'POST'])]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $search = $request->request->get('search', '');

        $qb = $em->getRepository(Users::class)->createQueryBuilder('u')
            ->where("JSON_CONTAINS(u.role, :role) = 1")
            ->setParameter('role', '"ROLE_PSYCHOLOGUE"');

        if ($search) {
            $qb->andWhere('u.nom LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
               ->setParameter('search', "%$search%");
        }

        $qb->orderBy('u.nom', 'ASC');
        $psychologues = $qb->getQuery()->getResult();

        return $this->render('reservation_front/index.html.twig', [
            'psychologues' => $psychologues,
            'search' => $search,
        ]);
    }

    /**
     * Step 2: Unified date/day/slots selection page
     */
    #[Route('/psychologue/{id}/select', name: 'app_reservation_front_select', methods: ['GET'])]
    public function select(Users $psychologue, EntityManagerInterface $em): Response
    {
        $today = new \DateTime('today');
        $months = [];

        // Generate 3 months ahead
        for ($i = 0; $i < 3; $i++) {
            $date = (clone $today)->modify("+{$i} months");
            $months[] = [
                'year' => $date->format('Y'),
                'month' => $date->format('m'),
                'label' => $date->format('F Y'),
                'combined' => $date->format('Y-m'),
            ];
        }

        // Get all planning records for this psychologist and convert to array
        $planningsQuery = $em->getRepository(Planning::class)->findBy(['psychologue' => $psychologue]);
        $plannings = [];
        foreach ($planningsQuery as $planning) {
            $plannings[] = [
                'jour' => strtolower($planning->getJour()),
                'heureDebut' => $planning->getHeureDebut()->format('H:i'),
                'heureFin' => $planning->getHeureFin()->format('H:i'),
                'pauseDebut' => $planning->getPauseDebut() ? $planning->getPauseDebut()->format('H:i') : null,
                'pauseFin' => $planning->getPauseFin() ? $planning->getPauseFin()->format('H:i') : null,
                'duree' => $planning->getDuree(),
            ];
        }

        // Get all reserved slots for this psychologist
        $reserved = $em->getRepository(Disponibilite::class)->findBy(['psychologue' => $psychologue, 'isReserved' => true]);
        $reservedTimes = array_map(fn($r) => $r->getDateHeure()->format('Y-m-d H:i'), $reserved);

        return $this->render('reservation_front/select.html.twig', [
            'psychologue' => $psychologue,
            'months' => $months,
            'plannings' => $plannings,
            'reservedTimes' => $reservedTimes,
            'today' => $today,
        ]);
    }

    /**
     * Step 3: Get slots for selected date (AJAX endpoint)
     */
    #[Route('/psychologue/{id}/slots/{dateSelected}', name: 'app_reservation_front_slots', methods: ['GET'])]
    public function slots(Users $psychologue, string $dateSelected, EntityManagerInterface $em): JsonResponse
    {
        // Validate date format
        try {
            $selectedDate = new \DateTime($dateSelected);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Date invalide'], 400);
        }

        error_log('Slots requested for: ' . $dateSelected . ' (' . $selectedDate->format('l') . '), Psychologue: ' . $psychologue->getId());

        // Get planning records for this psychologist
        $plannings = $em->getRepository(Planning::class)->findBy(['psychologue' => $psychologue]);
        error_log('Planning records found: ' . count($plannings));
        foreach ($plannings as $p) {
            error_log('  - ' . $p->getJour() . ': ' . $p->getHeureDebut()->format('H:i') . ' to ' . $p->getHeureFin()->format('H:i'));
        }

        // Generate all slots for selected date
        $slots = [];
        $dayMap = ['lundi' => 1, 'mardi' => 2, 'mercredi' => 3, 'jeudi' => 4, 'vendredi' => 5, 'samedi' => 6, 'dimanche' => 0];
        $selectedDayNum = (int)$selectedDate->format('w');

        foreach ($plannings as $planning) {
            $targetDayNum = $dayMap[strtolower($planning->getJour())] ?? null;
            if ($targetDayNum !== $selectedDayNum) continue;

            // Generate time slots
            $start = clone $selectedDate;
            $start->setTime(
                (int)$planning->getHeureDebut()->format('H'),
                (int)$planning->getHeureDebut()->format('i')
            );
            $end = clone $selectedDate;
            $end->setTime(
                (int)$planning->getHeureFin()->format('H'),
                (int)$planning->getHeureFin()->format('i')
            );

            $slotTime = clone $start;
            while ($slotTime <= $end) {
                $slotEnd = clone $slotTime;
                $slotEnd->modify('+' . $planning->getDuree() . ' minutes');

                if ($slotEnd > $end) break;

                // Check break time
                $pauseStart = $planning->getPauseDebut();
                $pauseEnd = $planning->getPauseFin();
                $isInBreak = false;

                if ($pauseStart && $pauseEnd) {
                    $pauseStartTime = $slotTime->format('H:i');
                    $pauseEndTime = $slotEnd->format('H:i');
                    $pauseStart = $pauseStart->format('H:i');
                    $pauseEnd = $pauseEnd->format('H:i');

                    if ($pauseStartTime < $pauseEnd && $pauseEndTime > $pauseStart) {
                        $isInBreak = true;
                    }
                }

                if (!$isInBreak) {
                    $slots[] = [
                        'time' => clone $slotTime,
                        'duration' => $planning->getDuree(),
                    ];
                }

                $slotTime->modify('+' . $planning->getDuree() . ' minutes');
            }
        }

        // Get reserved slots
        $reserved = $em->getRepository(Disponibilite::class)->findBy(['psychologue' => $psychologue, 'isReserved' => true]);
        $reservedTimes = array_map(fn($r) => $r->getDateHeure()->format('Y-m-d H:i'), $reserved);

        // Get current time for checking past slots
        $now = new \DateTime();

        // Format response with availability status
        $response = [];
        foreach ($slots as $slotData) {
            $slot = $slotData['time'];
            $duration = $slotData['duration'];
            $slotEnd = clone $slot;
            $slotEnd->modify('+' . $duration . ' minutes');

            $slotKey = $slot->format('Y-m-d H:i');
            $isPast = ($slotEnd <= $now);
            $response[] = [
                'time' => $slot->format('H:i'),
                'dateTime' => $slot->format('Y-m-d-H-i'),
                'isReserved' => in_array($slotKey, $reservedTimes) || $isPast,
                'isPast' => $isPast,
            ];
        }

        return new JsonResponse($response);
    }
 
    #[Route('/book/{psychologueId}/{slotDateTime}', name: 'app_reservation_front_book', methods: ['GET', 'POST'])]
public function book(int $psychologueId, string $slotDateTime, Request $request, EntityManagerInterface $em): Response
{
    $psychologue = $em->getRepository(Users::class)->find($psychologueId);
    if (!$psychologue) {
        $this->addFlash('error', 'Psychologue non trouvé.');
        return $this->redirectToRoute('app_reservation_front_index');
    }

    $dateParts = explode('-', $slotDateTime);
    if (count($dateParts) !== 5) {
        $this->addFlash('error', 'Créneau invalide.');
        return $this->redirectToRoute('app_reservation_front_index');
    }

    try {
        $slotTime = new \DateTime($dateParts[0] . '-' . $dateParts[1] . '-' . $dateParts[2] . ' ' . $dateParts[3] . ':' . $dateParts[4]);
    } catch (\Exception $e) {
        $this->addFlash('error', 'Créneau invalide.');
        return $this->redirectToRoute('app_reservation_front_index');
    }

    /** @var Users $patient */
    $patient = $this->getUser();
    if (!$patient) {
        return $this->redirectToRoute('app_login');
    }

    if ($request->isMethod('POST')) {
        $existingDispo = $em->getRepository(Disponibilite::class)->findOneBy([
            'psychologue' => $psychologue,
            'dateHeure'   => $slotTime,
            'isReserved'  => true,
        ]);

        if ($existingDispo) {
            $this->addFlash('error', 'Ce créneau n\'est plus disponible.');
            return $this->redirectToRoute('app_reservation_front_index');
        }

        $dispo = $em->getRepository(Disponibilite::class)->findOneBy([
            'psychologue' => $psychologue,
            'dateHeure'   => $slotTime,
        ]);

        if (!$dispo) {
            $planning = $em->getRepository(Planning::class)->findOneBy(['psychologue' => $psychologue]);
            if (!$planning) {
                $this->addFlash('error', 'Planning non trouvé.');
                return $this->redirectToRoute('app_reservation_front_index');
            }
            $dispo = new Disponibilite();
            $dispo->setPsychologue($psychologue);
            $dispo->setPlanning($planning);
            $dispo->setDateHeure($slotTime);
        }

        $dispo->setIsReserved(true);
        $em->persist($dispo);
        $em->flush();

        $reservation = new Reservation();
        $reservation->setPatient($patient);
        $reservation->setPsychologue($psychologue);
        $reservation->setDatePrevue($slotTime);
        $reservation->setDateDispo($slotTime);
        $reservation->setStatus('en attente');
        $em->persist($reservation);
        $em->flush();

        // ── Session type & meeting link ──
        $sessionType = $request->request->get('session_type', 'onsite');
        $meetLink    = null;

        if ($sessionType === 'online') {
            $meetLink = $this->generateMeetLink($patient, $psychologue, $slotTime);
        }

        $this->sendConfirmationEmail($patient, $psychologue, $slotTime, $sessionType, $meetLink);

        if ($meetLink) {
            // Also notify the psychologist
            $this->sendPsychologueEmail($patient, $psychologue, $slotTime, $meetLink);
        }

        $this->addFlash('success', 'Votre réservation a été confirmée ! Un email de confirmation vous a été envoyé.');
        return $this->redirectToRoute('app_reservation_front_confirmation', ['id' => $reservation->getId()]);
    }

    return $this->render('reservation_front/book.html.twig', [
        'psychologue' => $psychologue,
        'slotDateTime' => $slotDateTime,
        'slotTime'    => $slotTime,
        'patient'     => $patient,
    ]);
}

 

 
    private function generateMeetLink(Users $patient, Users $psychologue, \DateTimeInterface $slotTime): string
{
    // Create unique room for each appointment
    $roomName = sprintf(
        'psydesk-%d-%d-%s',
        $psychologue->getId(),
        $patient->getId(),
        $slotTime->format('Ymd-His')
    );
    return 'https://meet.jit.si/' . $roomName;
}



    private function sendConfirmationEmail(
    Users $patient,
    Users $psychologue,
    \DateTimeInterface $dateHeure,
    string $sessionType = 'onsite',
    ?string $meetLink = null
): void {
    $dateFormatted  = $dateHeure->format('d/m/Y');
    $heureFormatted = $dateHeure->format('H:i');
    $patientNom     = $patient->getPrenom() . ' ' . $patient->getNom();
    $psyNom         = 'Dr. ' . $psychologue->getPrenom() . ' ' . $psychologue->getNom();

    $isOnline       = ($sessionType === 'online');
    $sessionBadge   = $isOnline
        ? "<span style='background:#e0f2fe;color:#0369a1;padding:4px 14px;border-radius:20px;font-size:13px;font-weight:bold;'>💻 Séance en ligne</span>"
        : "<span style='background:#f0fdf4;color:#166534;padding:4px 14px;border-radius:20px;font-size:13px;font-weight:bold;'>🏥 Séance sur place</span>";

    $meetSection = '';
    if ($isOnline && $meetLink) {
        $meetSection = "
        <tr>
            <td style='padding:24px 40px;'>
                <table width='100%' cellpadding='0' cellspacing='0'
                       style='background:linear-gradient(135deg,#1e40af,#1d4ed8);border-radius:12px;overflow:hidden;'>
                    <tr>
                        <td style='padding:28px 32px;text-align:center;'>
                            <p style='margin:0 0 6px;color:#bfdbfe;font-size:12px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;'>
                                🎥 Lien de votre séance en ligne
                            </p>
                            <p style='margin:0 0 18px;color:#ffffff;font-size:13px;'>
                                Cliquez sur le bouton ci-dessous à l'heure de votre rendez-vous :
                            </p>
                            <a href='$meetLink'
                               style='display:inline-block;background:#ffffff;color:#1e40af;
                                      text-decoration:none;padding:14px 36px;border-radius:50px;
                                      font-size:15px;font-weight:bold;letter-spacing:0.5px;'>
                                🔗 Rejoindre la séance
                            </a>
                            <p style='margin:16px 0 0;color:#93c5fd;font-size:11px;word-break:break-all;'>
                                $meetLink
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>";
    } elseif (!$isOnline) {
        $meetSection = "
        <tr>
            <td style='padding:0 40px 24px;'>
                <table width='100%' cellpadding='0' cellspacing='0'
                       style='background:#f0fdf4;border:2px solid #bbf7d0;border-radius:12px;'>
                    <tr>
                        <td style='padding:20px 24px;text-align:center;'>
                            <p style='margin:0 0 6px;color:#166534;font-size:13px;font-weight:bold;'>
                                🏥 Séance en présentiel
                            </p>
                            <p style='margin:0;color:#15803d;font-size:13px;'>
                                Présentez-vous au cabinet du psychologue à l'heure convenue.
                                Arrivez quelques minutes à l'avance.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>";
    }

    $htmlContent = "
<!DOCTYPE html>
<html lang='fr'>
<head><meta charset='UTF-8'><title>Confirmation — PsyDesk</title></head>
<body style='margin:0;padding:0;background-color:#f0f4f8;font-family:Georgia,serif;'>
<table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f0f4f8;padding:40px 20px;'>
<tr><td align='center'>
<table width='600' cellpadding='0' cellspacing='0'
       style='background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.12);'>

    <tr>
        <td style='background:linear-gradient(135deg,#2d6a9f 0%,#1a4a7a 50%,#0d2d4f 100%);padding:48px 40px;text-align:center;'>
            <div style='font-size:48px;margin-bottom:12px;'>🧠</div>
            <h1 style='margin:0;color:#ffffff;font-size:28px;font-weight:normal;letter-spacing:3px;text-transform:uppercase;'>PsyDesk</h1>
            <p style='margin:8px 0 0;color:#a8c8e8;font-size:13px;letter-spacing:2px;text-transform:uppercase;'>Plateforme de Santé Mentale</p>
        </td>
    </tr>

    <tr>
        <td style='background:linear-gradient(90deg,#27ae60,#2ecc71);padding:20px 40px;text-align:center;'>
            <p style='margin:0;color:#ffffff;font-size:16px;font-weight:bold;letter-spacing:1px;'>✅ &nbsp; RÉSERVATION CONFIRMÉE</p>
        </td>
    </tr>

    <tr>
        <td style='padding:40px 40px 24px;text-align:center;'>
            $sessionBadge
        </td>
    </tr>

    <tr>
        <td style='padding:0 40px 16px;'>
            <h2 style='margin:0 0 12px;color:#1a2e44;font-size:22px;font-weight:normal;'>
                Bonjour <strong style='color:#2d6a9f;'>$patientNom</strong>,
            </h2>
            <p style='margin:0;color:#4a5568;font-size:16px;line-height:1.8;'>
                Votre séance a été réservée avec succès. Voici le récapitulatif :
            </p>
        </td>
    </tr>

    <tr>
        <td style='padding:16px 40px;'>
            <table width='100%' cellpadding='0' cellspacing='0'
                   style='background:#f7faff;border:2px solid #e2ecf8;border-radius:12px;overflow:hidden;'>
                <tr>
                    <td style='padding:20px 24px;border-bottom:1px solid #e2ecf8;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Psychologue</p>
                        <p style='margin:4px 0 0;font-size:17px;color:#1a2e44;font-weight:bold;'>$psyNom</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:20px 24px;border-bottom:1px solid #e2ecf8;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Date</p>
                        <p style='margin:4px 0 0;font-size:17px;color:#1a2e44;font-weight:bold;'>$dateFormatted</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:20px 24px;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Heure</p>
                        <p style='margin:4px 0 0;font-size:17px;color:#1a2e44;font-weight:bold;'>$heureFormatted</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    $meetSection

    <tr>
        <td style='padding:16px 40px 32px;'>
            <table width='100%' cellpadding='0' cellspacing='0'
                   style='background:#fffbf0;border-left:4px solid #f6ad55;border-radius:0 8px 8px 0;'>
                <tr>
                    <td style='padding:18px 20px;'>
                        <p style='margin:0 0 8px;font-size:12px;color:#744210;font-weight:bold;text-transform:uppercase;'>
                            💡 Conseils avant votre séance
                        </p>
                        <ul style='margin:0;padding-left:18px;color:#5d4037;font-size:13px;line-height:2;'>
                            <li>Arrivez / connectez-vous quelques minutes avant l'heure prévue</li>
                            <li>Notez vos pensées et ressentis de la semaine</li>
                            <li>Choisissez un endroit calme et privé</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td style='padding:0 40px 40px;text-align:center;'>
            <a href='http://localhost:8000/reservation/front/mes-reservations'
               style='display:inline-block;background:linear-gradient(135deg,#2d6a9f,#1a4a7a);color:#ffffff;
                      text-decoration:none;padding:14px 36px;border-radius:50px;font-size:14px;font-weight:bold;'>
                📋 Voir mes réservations
            </a>
        </td>
    </tr>

    <tr>
        <td style='background:#f7faff;padding:20px 40px;text-align:center;border-top:1px solid #e2ecf8;'>
            <p style='margin:0;color:#718096;font-size:12px;line-height:1.8;'>
                © 2026 PsyDesk — Plateforme de gestion pour psychologues et patients.
            </p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>";

    try {
        $transport = Transport::fromDsn('smtp://tester44.tester2@gmail.com:hpevdqbvclzebhxa@smtp.gmail.com:587');
        $mailer    = new Mailer($transport);
        $email     = (new Email())
            ->from('noreply@psydesk.com')
            ->to($patient->getEmail())
            ->subject('✅ Confirmation de votre rendez-vous — PsyDesk')
            ->html($htmlContent);
        $mailer->send($email);
    } catch (\Exception $e) {
        // silent fail
    }
}

private function sendPsychologueEmail(
    Users $patient,
    Users $psychologue,
    \DateTimeInterface $dateHeure,
    string $meetLink
): void {
    $dateFormatted  = $dateHeure->format('d/m/Y');
    $heureFormatted = $dateHeure->format('H:i');
    $patientNom     = $patient->getPrenom() . ' ' . $patient->getNom();

    $htmlContent = "
<!DOCTYPE html>
<html lang='fr'>
<head><meta charset='UTF-8'><title>Nouveau rendez-vous — PsyDesk</title></head>
<body style='margin:0;padding:0;background-color:#f0f4f8;font-family:Georgia,serif;'>
<table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f0f4f8;padding:40px 20px;'>
<tr><td align='center'>
<table width='600' cellpadding='0' cellspacing='0'
       style='background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.12);'>

    <tr>
        <td style='background:linear-gradient(135deg,#2d6a9f 0%,#1a4a7a 50%,#0d2d4f 100%);padding:40px;text-align:center;'>
            <h1 style='margin:0;color:#ffffff;font-size:26px;font-weight:normal;letter-spacing:3px;'>PsyDesk</h1>
            <p style='margin:8px 0 0;color:#a8c8e8;font-size:13px;'>Plateforme de Santé Mentale</p>
        </td>
    </tr>

    <tr>
        <td style='background:linear-gradient(90deg,#7c3aed,#6d28d9);padding:18px 40px;text-align:center;'>
            <p style='margin:0;color:#ffffff;font-size:15px;font-weight:bold;'>📅 &nbsp; NOUVEAU RENDEZ-VOUS EN LIGNE</p>
        </td>
    </tr>

    <tr>
        <td style='padding:40px 40px 24px;'>
            <h2 style='margin:0 0 12px;color:#1a2e44;font-size:20px;'>
                Bonjour <strong>Dr. {$psychologue->getPrenom()} {$psychologue->getNom()}</strong>,
            </h2>
            <p style='margin:0;color:#4a5568;font-size:15px;line-height:1.8;'>
                Un patient a réservé une séance <strong>en ligne</strong> avec vous.
            </p>
        </td>
    </tr>

    <tr>
        <td style='padding:0 40px 24px;'>
            <table width='100%' cellpadding='0' cellspacing='0'
                   style='background:#f7faff;border:2px solid #e2ecf8;border-radius:12px;'>
                <tr>
                    <td style='padding:18px 24px;border-bottom:1px solid #e2ecf8;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Patient</p>
                        <p style='margin:4px 0 0;font-size:16px;color:#1a2e44;font-weight:bold;'>$patientNom</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:18px 24px;border-bottom:1px solid #e2ecf8;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Date</p>
                        <p style='margin:4px 0 0;font-size:16px;color:#1a2e44;font-weight:bold;'>$dateFormatted</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding:18px 24px;'>
                        <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;'>Heure</p>
                        <p style='margin:4px 0 0;font-size:16px;color:#1a2e44;font-weight:bold;'>$heureFormatted</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td style='padding:0 40px 32px;'>
            <table width='100%' cellpadding='0' cellspacing='0'
                   style='background:linear-gradient(135deg,#1e40af,#1d4ed8);border-radius:12px;'>
                <tr>
                    <td style='padding:28px 32px;text-align:center;'>
                        <p style='margin:0 0 6px;color:#bfdbfe;font-size:12px;font-weight:bold;text-transform:uppercase;'>
                            🎥 Lien de la séance
                        </p>
                        <p style='margin:0 0 18px;color:#ffffff;font-size:13px;'>
                            Rejoignez la salle à l'heure convenue :
                        </p>
                        <a href='$meetLink'
                           style='display:inline-block;background:#ffffff;color:#1e40af;
                                  text-decoration:none;padding:14px 36px;border-radius:50px;
                                  font-size:14px;font-weight:bold;'>
                            🔗 Rejoindre la séance
                        </a>
                        <p style='margin:14px 0 0;color:#93c5fd;font-size:11px;word-break:break-all;'>$meetLink</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td style='background:#f7faff;padding:20px 40px;text-align:center;border-top:1px solid #e2ecf8;'>
            <p style='margin:0;color:#718096;font-size:12px;'>© 2026 PsyDesk</p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>";

    try {
        $transport = Transport::fromDsn('smtp://tester44.tester2@gmail.com:hpevdqbvclzebhxa@smtp.gmail.com:587');
        $mailer    = new Mailer($transport);
        $email     = (new Email())
            ->from('noreply@psydesk.com')
            ->to($psychologue->getEmail())
            ->subject('📅 Nouveau rendez-vous en ligne — PsyDesk')
            ->html($htmlContent);
        $mailer->send($email);
    } catch (\Exception $e) {
        // silent fail
    }
}




    /**
     * Confirmation page
     */
    #[Route('/confirmation/{id}', name: 'app_reservation_front_confirmation', methods: ['GET'])]
    public function confirmation(Reservation $reservation): Response
    {
        return $this->render('reservation_front/confirmation.html.twig', [
            'reservation' => $reservation,
            'psychologue' => $reservation->getPsychologue(),
        ]);
    }

    /**
     * My reservations list (patient's own)
     */
    #[Route('/mes-reservations', name: 'app_reservation_front_mine', methods: ['GET'])]
    public function mine(EntityManagerInterface $em): Response
    {
        /** @var Users $patient */
        $patient = $this->getUser();
        if (!$patient) {
            return $this->redirectToRoute('app_login');
        }

        // Find reservations where patient relationship matches
        $qb = $em->getRepository(Reservation::class)->createQueryBuilder('r');
        $reservations = $qb
            ->where('r.patient = :patient')
            ->setParameter('patient', $patient)
            ->orderBy('r.datePrevue', 'DESC')
            ->getQuery()
            ->getResult();

        $data = [];
        foreach ($reservations as $res) {
            $data[] = ['reservation' => $res, 'psychologue' => $res->getPsychologue()];
        }

        return $this->render('reservation_front/mine.html.twig', [
            'data' => $data,
        ]);
    }

/*    private function sendConfirmationEmail(Users $patient, Users $psychologue, \DateTimeInterface $dateHeure): void
    {
        $dateFormatted = $dateHeure->format('d/m/Y');
        $heureFormatted = $dateHeure->format('H:i');
        $patientNom = $patient->getPrenom() . ' ' . $patient->getNom();
        $psyNom = 'Dr. ' . $psychologue->getPrenom() . ' ' . $psychologue->getNom();

        $htmlContent = "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Confirmation de réservation - PsyDesk</title>
</head>
<body style='margin:0;padding:0;background-color:#f0f4f8;font-family:Georgia,serif;'>
    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f0f4f8;padding:40px 20px;'>
        <tr>
            <td align='center'>
                <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.12);'>
                    
                    <!-- Header -->
                    <tr>
                        <td style='background:linear-gradient(135deg,#2d6a9f 0%,#1a4a7a 50%,#0d2d4f 100%);padding:48px 40px;text-align:center;'>
                            <div style='font-size:48px;margin-bottom:12px;'>🧠</div>
                            <h1 style='margin:0;color:#ffffff;font-size:28px;font-weight:normal;letter-spacing:3px;text-transform:uppercase;font-family:Georgia,serif;'>PsyDesk</h1>
                            <p style='margin:8px 0 0;color:#a8c8e8;font-size:13px;letter-spacing:2px;text-transform:uppercase;'>Plateforme de Santé Mentale</p>
                        </td>
                    </tr>
                    
                    <!-- Success Banner -->
                    <tr>
                        <td style='background:linear-gradient(90deg,#27ae60,#2ecc71);padding:20px 40px;text-align:center;'>
                            <p style='margin:0;color:#ffffff;font-size:16px;font-weight:bold;letter-spacing:1px;'>✅ &nbsp; RÉSERVATION CONFIRMÉE</p>
                        </td>
                    </tr>

                    <!-- Greeting -->
                    <tr>
                        <td style='padding:48px 40px 0;'>
                            <h2 style='margin:0 0 16px;color:#1a2e44;font-size:22px;font-weight:normal;'>Bonjour <strong style='color:#2d6a9f;'>$patientNom</strong>,</h2>
                            <p style='margin:0;color:#4a5568;font-size:16px;line-height:1.8;'>
                                Votre séance avec votre psychologue a été réservée avec succès. Voici le récapitulatif de votre rendez-vous :
                            </p>
                        </td>
                    </tr>

                    <!-- Appointment Card -->
                    <tr>
                        <td style='padding:32px 40px;'>
                            <table width='100%' cellpadding='0' cellspacing='0' style='background:#f7faff;border:2px solid #e2ecf8;border-radius:12px;overflow:hidden;'>
                                <tr>
                                    <td style='padding:24px;border-bottom:1px solid #e2ecf8;'>
                                        <table width='100%' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td style='width:50px;font-size:28px;vertical-align:middle;'>👨‍⚕️</td>
                                                <td style='vertical-align:middle;'>
                                                    <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;letter-spacing:1px;'>Votre psychologue</p>
                                                    <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$psyNom</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:24px;border-bottom:1px solid #e2ecf8;'>
                                        <table width='100%' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td style='width:50px;font-size:28px;vertical-align:middle;'>📅</td>
                                                <td style='vertical-align:middle;'>
                                                    <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;letter-spacing:1px;'>Date du rendez-vous</p>
                                                    <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$dateFormatted</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:24px;'>
                                        <table width='100%' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td style='width:50px;font-size:28px;vertical-align:middle;'>🕐</td>
                                                <td style='vertical-align:middle;'>
                                                    <p style='margin:0;font-size:11px;color:#718096;text-transform:uppercase;letter-spacing:1px;'>Heure de la séance</p>
                                                    <p style='margin:4px 0 0;font-size:18px;color:#1a2e44;font-weight:bold;'>$heureFormatted</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Tips -->
                    <tr>
                        <td style='padding:0 40px 32px;'>
                            <table width='100%' cellpadding='0' cellspacing='0' style='background:#fffbf0;border-left:4px solid #f6ad55;border-radius:0 8px 8px 0;padding:20px;'>
                                <tr>
                                    <td style='padding:20px;'>
                                        <p style='margin:0 0 8px;font-size:13px;color:#744210;font-weight:bold;text-transform:uppercase;letter-spacing:1px;'>💡 Conseils avant votre séance</p>
                                        <ul style='margin:0;padding-left:20px;color:#5d4037;font-size:14px;line-height:2;'>
                                            <li>Arrivez quelques minutes avant l'heure prévue</li>
                                            <li>Notez vos pensées et ressentis de la semaine</li>
                                            <li>Choisissez un endroit calme et privé pour la séance</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- CTA Button -->
                    <tr>
                        <td style='padding:0 40px 40px;text-align:center;'>
                            <a href='http://localhost:8000/reservation/front/mes-reservations' 
                               style='display:inline-block;background:linear-gradient(135deg,#2d6a9f,#1a4a7a);color:#ffffff;text-decoration:none;padding:16px 40px;border-radius:50px;font-size:15px;letter-spacing:1px;font-weight:bold;'>
                                📋 Voir mes réservations
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style='background:#f7faff;padding:24px 40px;text-align:center;border-top:1px solid #e2ecf8;'>
                            <p style='margin:0;color:#718096;font-size:12px;line-height:1.8;'>
                                Cet email a été envoyé automatiquement par PsyDesk.<br>
                                &copy; 2026 PsyDesk — Plateforme de gestion pour psychologues et patients.<br>
                                <span style='color:#a0aec0;'>Si vous n'êtes pas à l'origine de cette réservation, contactez notre support.</span>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
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
                ->subject('✅ Confirmation de votre rendez-vous — PsyDesk')
                ->html($htmlContent);

            $mailer->send($email);
        } catch (\Exception $e) {
            // Log error but don't break the flow
            // $logger->error('Mail send failed: ' . $e->getMessage());
        }
    }*/

    /**
     * Show user's reservations
     */
    #[Route('/mes-reservations', name: 'app_reservation_front_my_reservations', methods: ['GET'])]
    public function myReservations(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $reservations = $em->getRepository(Reservation::class)->findBy(
            ['patient' => $user],
            ['datePrevue' => 'DESC']
        );

        return $this->render('reservation_front/my_reservations.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    /**
     * Cancel a reservation
     */
    #[Route('/{id}/cancel', name: 'app_reservation_front_cancel', methods: ['POST'])]
    public function cancelReservation(Reservation $reservation, EntityManagerInterface $em, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Check if user owns this reservation
        if ($reservation->getPatient() !== $user) {
            $this->addFlash('error', 'Non autorisé.');
            return $this->redirectToRoute('app_reservation_front_my_reservations');
        }

        // Check if reservation is "en attente" (only allow cancelling pending reservations)
        if ($reservation->getStatus() !== 'en attente') {
            $this->addFlash('error', 'Vous ne pouvez annuler que les réservations en attente.');
            return $this->redirectToRoute('app_reservation_front_my_reservations');
        }

        // Check CSRF token
        if (!$this->isCsrfTokenValid('cancel' . $reservation->getId(), $request->request->get('_token'))) {
            $this->addFlash('error', 'Token invalide.');
            return $this->redirectToRoute('app_reservation_front_my_reservations');
        }

        // Find and delete associated Disponibilite records for this time
        // Delete any reserved slots at the reservation time for the same psychologist
        if ($reservation->getDatePrevue()) {
            $disponibilites = $em->getRepository(Disponibilite::class)->findBy([
                'psychologue' => $reservation->getPsychologue(),
                'dateHeure' => $reservation->getDatePrevue(),
                'isReserved' => true,
            ]);
            foreach ($disponibilites as $dispo) {
                $em->remove($dispo);
            }
        }

        // Delete the reservation
        $em->remove($reservation);
        $em->flush();

        $this->addFlash('success', 'Rendez-vous annulé avec succès.');
        return $this->redirectToRoute('app_reservation_front_my_reservations');
    }

    /**
     * Get chatbot widget data and initialize conversation
     */
    #[Route('/diagnostic', name: 'app_reservation_front_diagnostic', methods: ['POST'])]
    public function diagnostic(Request $request): JsonResponse
    {
        $patient = $this->getUser();
        if (!$patient) {
            return new JsonResponse(['success' => false, 'error' => 'Not authenticated'], 401);
        }

        // Initialize session conversation
        if (!$request->getSession()->has('chatbot_conversation')) {
            $request->getSession()->set('chatbot_conversation', []);
        }

        $conversation = $request->getSession()->get('chatbot_conversation');

        return new JsonResponse([
            'success' => true,
            'conversation' => $conversation,
        ]);
    }

    /**
     * Send message to diagnostic chatbot and receive AI response
     */
    #[Route('/diagnostic/send', name: 'app_reservation_front_diagnostic_send', methods: ['POST'])]
    public function sendDiagnosticMessage(Request $request): JsonResponse
    {
        $patient = $this->getUser();
        if (!$patient) {
            return new JsonResponse(['success' => false, 'error' => 'Not authenticated'], 401);
        }

        $userMessage = $request->request->get('message', '');
        if (!$userMessage || strlen($userMessage) > 500) {
            return new JsonResponse(['success' => false, 'error' => 'Invalid message'], 400);
        }

        // Get/initialize conversation from session
        $session = $request->getSession();
        $conversation = $session->get('chatbot_conversation', []);

        // Add user message
        $conversation[] = ['role' => 'user', 'content' => $userMessage];

        // Call Groq API
        $client = HttpClient::create();

      
        $apiKey = $_ENV['GROQ_API_KEY'];

        $systemPrompt = <<<'PROMPT'
Vous êtes un assistant IA d'auto-évaluation de la santé mentale. Votre rôle est de:
1. Écouter les utilisateurs décrire leurs symptômes de santé mentale
2. Poser des questions de clarification sur leur état émotionnel, sommeil, appétit, niveaux d'anxiété, humeur
3. Fournir des informations préliminaires sur les conditions potentielles (dépression, anxiété, trouble bipolaire, etc.)
4. TOUJOURS rappeler aux utilisateurs que ce n'est pas un diagnostic professionnel - ils doivent consulter un psychologue agréé

Vous devez UNIQUEMENT répondre aux questions sur:
- Les symptômes de santé mentale
- L'état émotionnel et les sentiments
- Les indicateurs de stress, d'anxiété et de dépression
- Les changements de sommeil, d'appétit et de concentration
- Les stratégies d'auto-soins et d'adaptation

Vous DEVEZ REFUSER de:
- Répondre aux conseils médicaux pour les conditions physiques
- Fournir des recommandations de médicaments
- Répondre aux questions non liées à la santé mentale
- Faire des diagnostics définitifs

Soyez toujours empathique et encourageant. Suggérez de prendre rendez-vous avec de vrais psychologues.
PROMPT;

        try {
            $response = $client->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'llama-3.1-8b-instant',
                    'messages' => array_merge(
                        [['role' => 'system', 'content' => $systemPrompt]],
                        $conversation
                    ),
                    'temperature' => 0.7,
                    'max_tokens' => 500,
                ],
            ]);

            $data = $response->toArray();
            $aiMessage = $data['choices'][0]['message']['content'] ?? 'I encountered an error processing your request.';

            // Add AI response to conversation
            $conversation[] = ['role' => 'assistant', 'content' => $aiMessage];
            $session->set('chatbot_conversation', $conversation);

            return new JsonResponse([
                'success' => true,
                'message' => $aiMessage,
            ]);

        } catch (\Exception $e) {
            // Get more detailed error info
            $errorMsg = $e->getMessage();
            if (method_exists($e, 'getResponse') && $e->getResponse()) {
                $errorMsg = $e->getResponse()->getContent(false);
            }

            return new JsonResponse([
                'success' => false,
                'error' => 'API error: ' . $errorMsg,
            ], 500);
        }
    }

    /**
     * Clear chatbot conversation
     */
    #[Route('/diagnostic/clear', name: 'app_reservation_front_diagnostic_clear', methods: ['POST'])]
    public function clearDiagnosticConversation(Request $request): JsonResponse
    {
        $patient = $this->getUser();
        if (!$patient) {
            return new JsonResponse(['success' => false, 'error' => 'Not authenticated'], 401);
        }

        $request->getSession()->remove('chatbot_conversation');
        return new JsonResponse(['success' => true]);
    }
}