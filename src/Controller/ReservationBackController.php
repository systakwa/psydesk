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
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\StreamedResponse;



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
 



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

    /**
     * Display statistics for reservations
     */
    #[Route('/stat', name: 'app_reservation_back_stat', methods: ['GET'])]
    public function statistics(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // Get all reservations for statistics
        $query = $entityManager->getRepository(Reservation::class)->createQueryBuilder('r');

        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('r.psychologue = :psychologue')
                ->setParameter('psychologue', $user);
        }

        $allReservations = $query->getQuery()->getResult();

        // Calculate statistics by status
        $statsByStatus = [];
        foreach ($allReservations as $reservation) {
            $status = $reservation->getStatus();
            if (!isset($statsByStatus[$status])) {
                $statsByStatus[$status] = 0;
            }
            $statsByStatus[$status]++;
        }

        // Calculate statistics by psychologist (for admin)
        $statsByPsychologist = [];
        if ($this->isGranted('ROLE_ADMIN')) {
            foreach ($allReservations as $reservation) {
                $psy = $reservation->getPsychologue();
                $psyName = $psy ? $psy->getPrenom() . ' ' . $psy->getNom() : 'N/A';
                if (!isset($statsByPsychologist[$psyName])) {
                    $statsByPsychologist[$psyName] = 0;
                }
                $statsByPsychologist[$psyName]++;
            }
        }

        $statistics = [
            'by_status' => $statsByStatus,
            'by_psychologist' => $statsByPsychologist,
            'total' => count($allReservations),
        ];

        return $this->render('reservation_back/statistics.html.twig', [
            'statistics' => $statistics,
        ]);
    }

    /**
     * Export all reservations to PDF
     */
    #[Route('/pdf-all', name: 'app_reservation_back_pdf_all', methods: ['GET'])]
    public function exportAllPdf(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // Get all reservations
        $query = $entityManager->getRepository(Reservation::class)->createQueryBuilder('r');

        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('r.psychologue = :psychologue')
                ->setParameter('psychologue', $user);
        }

        $reservations = $query->orderBy('r.datePrevue', 'DESC')->getQuery()->getResult();

        $html = $this->renderView('reservation_back/reservations_pdf.html.twig', [
            'reservations' => $reservations,
        ]);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="reservations_' . date('Y-m-d') . '.pdf"',
            ]
        );
    }

    /**
     * Export all reservations to CSV (opens in Excel)
     */
   
   /* #[Route('/csv-all', name: 'app_reservation_back_excel', methods: ['GET'])]
    public function exportExcel(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // Get all reservations
        $query = $entityManager->getRepository(Reservation::class)->createQueryBuilder('r');

        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $query->where('r.psychologue = :psychologue')
                ->setParameter('psychologue', $user);
        }

        $reservations = $query->orderBy('r.datePrevue', 'DESC')->getQuery()->getResult();

        // Create CSV content
        $csv = "Patient,Email Patient,Psychologue,Email Psychologue,Date Prévue,Date Disponibilité,Statut\n";

        foreach ($reservations as $reservation) {
            $patient = $reservation->getPatient();
            $psychologue = $reservation->getPsychologue();

            $patientName = $patient ? $patient->getPrenom() . ' ' . $patient->getNom() : 'N/A';
            $patientEmail = $patient ? $patient->getEmail() : 'N/A';
            $psyName = $psychologue ? $psychologue->getPrenom() . ' ' . $psychologue->getNom() : 'N/A';
            $psyEmail = $psychologue ? $psychologue->getEmail() : 'N/A';
            $datePrevue = $reservation->getDatePrevue() ? $reservation->getDatePrevue()->format('d/m/Y H:i') : 'N/A';
            $dateDispo = $reservation->getDateDispo() ? $reservation->getDateDispo()->format('d/m/Y H:i') : 'N/A';
            $status = $reservation->getStatus();

            $csv .= "\"$patientName\",\"$patientEmail\",\"$psyName\",\"$psyEmail\",\"$datePrevue\",\"$dateDispo\",\"$status\"\n";
        }

        return new Response(
            $csv,
            Response::HTTP_OK,
            [
                'Content-Type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="reservations_' . date('Y-m-d') . '.csv"',
            ]
        );
    }*/


#[Route('/csv-all', name: 'app_reservation_back_excel', methods: ['GET'])]
public function exportExcel(EntityManagerInterface $entityManager): StreamedResponse
{
    $user = $this->getUser();

    $query = $entityManager->getRepository(Reservation::class)->createQueryBuilder('r');
    if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
        $query->where('r.psychologue = :psychologue')
              ->setParameter('psychologue', $user);
    }
    $reservations = $query->orderBy('r.datePrevue', 'DESC')->getQuery()->getResult();

    // ── Count by status ──
    $statusCounts = ['confirmé' => 0, 'en attente' => 0, 'annulé' => 0];
    foreach ($reservations as $r) {
        $s = $r->getStatus();
        if (isset($statusCounts[$s])) $statusCounts[$s]++;
    }

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getProperties()
        ->setCreator('PsyDesk')
        ->setTitle('Réservations PsyDesk')
        ->setDescription('Export des réservations — ' . date('d/m/Y'));

    // ════════════════════════════════════════
    //  SHEET 1 — Reservations list
    // ════════════════════════════════════════
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Réservations');

    // ── Logo / Title banner (rows 1-3) ──
    $sheet->mergeCells('A1:G1');
    $sheet->setCellValue('A1', '🧠  PsyDesk — Export des Réservations');
    $sheet->getStyle('A1')->applyFromArray([
        'font'      => ['bold' => true, 'size' => 16, 'color' => ['argb' => 'FFFFFFFF'], 'name' => 'Calibri'],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1A3C6E']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $sheet->getRowDimension(1)->setRowHeight(38);

    $sheet->mergeCells('A2:G2');
    $sheet->setCellValue('A2', 'Généré le ' . date('d/m/Y à H:i') . '   |   Total : ' . count($reservations) . ' réservation(s)');
    $sheet->getStyle('A2')->applyFromArray([
        'font'      => ['italic' => true, 'size' => 11, 'color' => ['argb' => 'FFB0C8E8']],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF0D2D4F']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $sheet->getRowDimension(2)->setRowHeight(22);

    // ── Stats summary bar (row 3) ──
    $sheet->setCellValue('A3', '✅ Confirmés : ' . $statusCounts['confirmé']);
    $sheet->setCellValue('C3', '⏳ En attente : ' . $statusCounts['en attente']);
    $sheet->setCellValue('E3', '❌ Annulés : ' . $statusCounts['annulé']);
    $sheet->mergeCells('A3:B3');
    $sheet->mergeCells('C3:D3');
    $sheet->mergeCells('E3:G3');
    $sheet->getStyle('A3:B3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['argb' => 'FF065F46'], 'size' => 11],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFD1FAE5']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $sheet->getStyle('C3:D3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['argb' => 'FF92400E'], 'size' => 11],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFFEF3C7']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $sheet->getStyle('E3:G3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['argb' => 'FF991B1B'], 'size' => 11],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFFEE2E2']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $sheet->getRowDimension(3)->setRowHeight(24);

    // ── Spacer row 4 ──
    $sheet->getRowDimension(4)->setRowHeight(6);

    // ── Column headers (row 5) ──
    $headers = ['A5' => 'Patient', 'B5' => 'Email Patient', 'C5' => 'Psychologue',
                'D5' => 'Email Psychologue', 'E5' => 'Date Prévue', 'F5' => 'Disponibilité', 'G5' => 'Statut'];
    foreach ($headers as $cell => $label) {
        $sheet->setCellValue($cell, $label);
    }
    $sheet->getStyle('A5:G5')->applyFromArray([
        'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 'size' => 12],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF2563EB']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        'borders'   => [
            'bottom' => ['borderStyle' => Border::BORDER_MEDIUM, 'color' => ['argb' => 'FF1E40AF']],
            'allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FF93C5FD']],
        ],
    ]);
    $sheet->getRowDimension(5)->setRowHeight(26);

    // ── Data rows (starting row 6) ──
    $statusStyles = [
        'confirmé'   => ['bg' => 'FFD1FAE5', 'fg' => 'FF065F46', 'label' => '✅ Confirmé'],
        'en attente' => ['bg' => 'FFFEF3C7', 'fg' => 'FF92400E', 'label' => '⏳ En attente'],
        'annulé'     => ['bg' => 'FFFEE2E2', 'fg' => 'FF991B1B', 'label' => '❌ Annulé'],
    ];

    $dataRow = 6;
    foreach ($reservations as $i => $reservation) {
        $patient  = $reservation->getPatient();
        $psy      = $reservation->getPsychologue();
        $status   = $reservation->getStatus();
        $isEven   = ($i % 2 === 0);

        $sheet->setCellValue('A' . $dataRow, $patient ? $patient->getPrenom() . ' ' . $patient->getNom() : 'N/A');
        $sheet->setCellValue('B' . $dataRow, $patient ? $patient->getEmail() : 'N/A');
        $sheet->setCellValue('C' . $dataRow, $psy ? 'Dr. ' . $psy->getPrenom() . ' ' . $psy->getNom() : 'N/A');
        $sheet->setCellValue('D' . $dataRow, $psy ? $psy->getEmail() : 'N/A');
        $sheet->setCellValue('E' . $dataRow, $reservation->getDatePrevue()?->format('d/m/Y H:i') ?? 'N/A');
        $sheet->setCellValue('F' . $dataRow, $reservation->getDateDispo()?->format('d/m/Y H:i') ?? 'N/A');

        $st = $statusStyles[$status] ?? ['bg' => 'FFF1F5F9', 'fg' => 'FF334155', 'label' => $status];
        $sheet->setCellValue('G' . $dataRow, $st['label']);

        // Row base style (alternating)
        $rowBg = $isEven ? 'FFF8FAFF' : 'FFFFFFFF';
        $sheet->getStyle('A' . $dataRow . ':F' . $dataRow)->applyFromArray([
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => $rowBg]],
            'font'      => ['size' => 11, 'color' => ['argb' => 'FF1E293B']],
            'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFE2E8F0']]],
        ]);

        // Status cell
        $sheet->getStyle('G' . $dataRow)->applyFromArray([
            'font'      => ['bold' => true, 'size' => 11, 'color' => ['argb' => $st['fg']]],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => $st['bg']]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFE2E8F0']]],
        ]);

        $sheet->getRowDimension($dataRow)->setRowHeight(22);
        $dataRow++;
    }

    // ── Total footer row ──
    $sheet->mergeCells('A' . $dataRow . ':F' . $dataRow);
    $sheet->setCellValue('A' . $dataRow, 'TOTAL : ' . count($reservations) . ' réservation(s)');
    $sheet->setCellValue('G' . $dataRow, '');
    $sheet->getStyle('A' . $dataRow . ':G' . $dataRow)->applyFromArray([
        'font'      => ['bold' => true, 'size' => 12, 'color' => ['argb' => 'FFFFFFFF']],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1A3C6E']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        'borders'   => ['top' => ['borderStyle' => Border::BORDER_MEDIUM, 'color' => ['argb' => 'FF93C5FD']]],
    ]);
    $sheet->getRowDimension($dataRow)->setRowHeight(26);

    // ── Column widths ──
    foreach (['A' => 24, 'B' => 30, 'C' => 24, 'D' => 30, 'E' => 18, 'F' => 18, 'G' => 16] as $col => $w) {
        $sheet->getColumnDimension($col)->setWidth($w);
    }

    // ── Freeze pane & auto-filter ──
    $sheet->freezePane('A6');
    $sheet->setAutoFilter('A5:G5');

    // ════════════════════════════════════════
    //  SHEET 2 — Statistics summary
    // ════════════════════════════════════════
    $statsSheet = $spreadsheet->createSheet();
    $statsSheet->setTitle('Statistiques');

    $statsSheet->mergeCells('A1:D1');
    $statsSheet->setCellValue('A1', '📊  Statistiques des Réservations');
    $statsSheet->getStyle('A1')->applyFromArray([
        'font'      => ['bold' => true, 'size' => 15, 'color' => ['argb' => 'FFFFFFFF']],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1A3C6E']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    ]);
    $statsSheet->getRowDimension(1)->setRowHeight(34);

    // Status breakdown table
    $statsSheet->setCellValue('A3', 'Statut');
    $statsSheet->setCellValue('B3', 'Nombre');
    $statsSheet->setCellValue('C3', 'Pourcentage');
    $statsSheet->getStyle('A3:C3')->applyFromArray([
        'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF2563EB']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    ]);

    $total = count($reservations);
    $statsData = [
        ['label' => '✅ Confirmé',   'key' => 'confirmé',   'bg' => 'FFD1FAE5', 'fg' => 'FF065F46'],
        ['label' => '⏳ En attente', 'key' => 'en attente', 'bg' => 'FFFEF3C7', 'fg' => 'FF92400E'],
        ['label' => '❌ Annulé',     'key' => 'annulé',     'bg' => 'FFFEE2E2', 'fg' => 'FF991B1B'],
    ];

    $sRow = 4;
    foreach ($statsData as $stat) {
        $count = $statusCounts[$stat['key']];
        $pct   = $total > 0 ? round(($count / $total) * 100, 1) : 0;
        $statsSheet->setCellValue('A' . $sRow, $stat['label']);
        $statsSheet->setCellValue('B' . $sRow, $count);
        $statsSheet->setCellValue('C' . $sRow, $pct . '%');
        $statsSheet->getStyle('A' . $sRow . ':C' . $sRow)->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['argb' => $stat['fg']]],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => $stat['bg']]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['argb' => 'FFE2E8F0']]],
        ]);
        $statsSheet->getRowDimension($sRow)->setRowHeight(22);
        $sRow++;
    }

    // Total row on stats sheet
    $statsSheet->setCellValue('A' . $sRow, 'TOTAL');
    $statsSheet->setCellValue('B' . $sRow, $total);
    $statsSheet->setCellValue('C' . $sRow, '100%');
    $statsSheet->getStyle('A' . $sRow . ':C' . $sRow)->applyFromArray([
        'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FF1A3C6E']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    ]);
    $statsSheet->getRowDimension($sRow)->setRowHeight(22);

    foreach (['A' => 20, 'B' => 12, 'C' => 14] as $col => $w) {
        $statsSheet->getColumnDimension($col)->setWidth($w);
    }

    // ── Set active sheet back to first ──
    $spreadsheet->setActiveSheetIndex(0);

    // ── Stream the response ──
    $filename = 'reservations_psydesk_' . date('Y-m-d') . '.xlsx';

    $response = new StreamedResponse(function () use ($spreadsheet) {
        $writer = new Xlsx($spreadsheet);
        $writer->setIncludeCharts(true);
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
    $response->headers->set('Cache-Control', 'max-age=0, no-store');
    $response->headers->set('Pragma', 'no-cache');

    return $response;
}






    

    #[Route('/calendar', name: 'app_reservation_back_calendar', methods: ['GET'])]
    public function calendar(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        // Get reservations for current psychologist
        if ($this->isGranted('ROLE_PSYCHOLOGUE') && !$this->isGranted('ROLE_ADMIN')) {
            $psychologue = $user;
            $reservations = $em->getRepository(Reservation::class)->createQueryBuilder('r')
                ->where('r.psychologue = :psychologue')
                ->andWhere('r.datePrevue IS NOT NULL')
                ->setParameter('psychologue', $user)
                ->orderBy('r.datePrevue', 'ASC')
                ->getQuery()
                ->getResult();
        } else {
            // Admin sees all reservations with valid dates
            $psychologue = null;
            $reservations = $em->getRepository(Reservation::class)->createQueryBuilder('r')
                ->where('r.datePrevue IS NOT NULL')
                ->orderBy('r.datePrevue', 'ASC')
                ->getQuery()
                ->getResult();
        }

        // Get planning for psychologist (for time slots)
        $planning = [];
        if ($psychologue) {
            $plannings = $em->getRepository(\App\Entity\Planning::class)->findBy(['psychologue' => $psychologue]);
            foreach ($plannings as $p) {
                $planning[] = [
                    'jour' => strtolower($p->getJour()),
                    'heureDebut' => $p->getHeureDebut()->format('H:i'),
                    'heureFin' => $p->getHeureFin()->format('H:i'),
                ];
            }
        }

        return $this->render('reservation_back/calendar.html.twig', [
            'reservations' => $reservations,
            'planning' => $planning,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_back_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $reservation = $em->getRepository(Reservation::class)->find($id);

        if (!$reservation) {
            $this->addFlash('error', 'Reservation not found.');
            return $this->redirectToRoute('app_reservation_back_index');
        }

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

    #[Route('/{id}/pdf', name: 'app_reservation_back_pdf', methods: ['GET'])]
    public function exportPdf(Reservation $reservation): Response
    {
        $html = $this->renderView('reservation_back/reservation_pdf.html.twig', [
            'reservation' => $reservation,
            'patient' => $reservation->getPatient(),
            'psychologue' => $reservation->getPsychologue(),
        ]);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="reservation_' . $reservation->getId() . '.pdf"',
            ]
        );
    }
}
