<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminParticipationController extends AbstractController
{
    #[Route('/admin/participation', name: 'app_admin_participation')]
    public function index(): Response
    {
        return $this->render('/admin/template/admin_participation/index.html.twig', [
            'controller_name' => 'AdminParticipationController',
        ]);
    }
}
