<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OAuthController extends AbstractController
{
    #[Route('/connect/google', name: 'connect_google_start')]
    public function connectGoogle(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry->getClient('google')->redirect([
            'email', 'profile'
        ]);
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectGoogleCheck(): Response
    {
        // Cette route est gérée par le authenticator
        return $this->redirectToRoute('app_login');
    }
}