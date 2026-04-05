<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/dashboard/reclamation', name: 'app_reclamation')]
    public function reclamation(): Response
    {
        return $this->render('Objectif_reclamtion_back/reclamation.html.twig');
    }

     #[Route('/dashboard/admin', name: 'app_dashboard_admin')]
    public function adminDashboard(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/dashboard/psychologue', name: 'app_dashboard_psychologue')]
    public function psychologueDashboard(): Response
    {
        return $this->render('dashboard_Psy/index.html.twig');
    }

    #[Route('/dashboard/patient', name: 'app_dashboard_patient')]
    public function patientDashboard(): Response
    {
        return $this->render('dashboard_p/index.html.twig');
    }
    
    // Ajoutez ici les routes pour les autres pages : app_buttons, app_dropdowns, etc.
}