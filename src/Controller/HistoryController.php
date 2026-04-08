<?php
// src/Controller/HistoryController.php

namespace App\Controller;

use App\Entity\UserHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/history')]
#[IsGranted('ROLE_ADMIN')]
class HistoryController extends AbstractController
{
    #[Route('/', name: 'app_history_index')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Récupérer tous les historiques
        $history = $entityManager->getRepository(UserHistory::class)->findBy([], ['createdAt' => 'DESC']);
        
        // Statistiques
        $totalActions = count($history);
        $totalConnexions = count(array_filter($history, fn($h) => $h->getActionType() === 'login'));
        $totalCreations = count(array_filter($history, fn($h) => $h->getActionType() === 'create'));
        $totalModifications = count(array_filter($history, fn($h) => $h->getActionType() === 'edit'));
        $totalSuppressions = count(array_filter($history, fn($h) => $h->getActionType() === 'delete'));
        $totalResetPassword = count(array_filter($history, fn($h) => $h->getActionType() === 'reset_password'));
        
        // Filtrer par type d'action
        $filter = $request->query->get('filter', 'all');
        if ($filter !== 'all') {
            $history = array_filter($history, fn($h) => $h->getActionType() === $filter);
        }
        
        // Filtrer par date
        $dateFilter = $request->query->get('date', '');
        if ($dateFilter) {
            $date = new \DateTime($dateFilter);
            $history = array_filter($history, fn($h) => $h->getCreatedAt()->format('Y-m-d') === $date->format('Y-m-d'));
        }
        
        return $this->render('history/index.html.twig', [
            'history' => $history,
            'totalActions' => $totalActions,
            'totalConnexions' => $totalConnexions,
            'totalCreations' => $totalCreations,
            'totalModifications' => $totalModifications,
            'totalSuppressions' => $totalSuppressions,
            'totalResetPassword' => $totalResetPassword,
            'currentFilter' => $filter,
            'currentDate' => $dateFilter,
        ]);
    }
    
    #[Route('/clear', name: 'app_history_clear', methods: ['POST'])]
    public function clear(EntityManagerInterface $entityManager): Response
    {
        // Vérifier le token CSRF
        if (!$this->isCsrfTokenValid('clear_history', $this->getUser()->getId())) {
            $this->addFlash('error', 'Token invalide');
            return $this->redirectToRoute('app_history_index');
        }
        
        $history = $entityManager->getRepository(UserHistory::class)->findAll();
        foreach ($history as $item) {
            $entityManager->remove($item);
        }
        $entityManager->flush();
        
        $this->addFlash('success', '📜 Historique vidé avec succès !');
        return $this->redirectToRoute('app_history_index');
    }
}