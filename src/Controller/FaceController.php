<?php
// src/Controller/FaceController.php

namespace App\Controller;

use App\Entity\Users;
use App\Service\FacePlusPlusService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authenticator\Token\PostAuthenticationToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class FaceController extends AbstractController
{
    #[Route('/face/register', name: 'face_register', methods: ['POST'])]
    public function registerFace(Request $request, FacePlusPlusService $faceService, EntityManagerInterface $em): JsonResponse
    {
        $imageFile = $request->files->get('image');
        
        if (!$imageFile) {
            return $this->json(['success' => false, 'message' => 'Aucune image'], 400);
        }
        
        $tempPath = $imageFile->getPathname();
        $faceToken = $faceService->detectFace($tempPath);
        
        if (!$faceToken) {
            return $this->json(['success' => false, 'message' => 'Aucun visage détecté'], 400);
        }
        
        $request->getSession()->set('face_token', $faceToken);
        
        return $this->json(['success' => true, 'face_token' => $faceToken]);
    }
    
    #[Route('/face/login', name: 'face_login', methods: ['POST'])]
    public function loginFace(Request $request, FacePlusPlusService $faceService, EntityManagerInterface $em): JsonResponse
    {
        $imageFile = $request->files->get('image');
        
        if (!$imageFile) {
            return $this->json(['success' => false, 'message' => 'Aucune image'], 400);
        }
        
        $tempPath = $imageFile->getPathname();
        $inputFaceToken = $faceService->detectFace($tempPath);
        
        if (!$inputFaceToken) {
            return $this->json(['success' => false, 'message' => 'Aucun visage détecté'], 400);
        }
        
        $users = $em->getRepository(Users::class)->findAll();
        
        foreach ($users as $user) {
            $storedFaceToken = $user->getFaceToken();
            if ($storedFaceToken && $faceService->compareFaces($inputFaceToken, $storedFaceToken)) {
                // Connecter l'utilisateur
                $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
                $this->container->get('security.token_storage')->setToken($token);
                
                return $this->json(['success' => true, 'redirect' => $this->generateUrl('app_dashboard')]);
            }
        }
        
        return $this->json(['success' => false, 'message' => 'Visage non reconnu']);
    }
    
    #[Route('/face/save-token', name: 'face_save_token', methods: ['POST'])]
    public function saveFaceToken(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Non connecté'], 401);
        }
        
        $faceToken = $request->getSession()->get('face_token');
        
        if ($faceToken) {
            $user->setFaceToken($faceToken);
            $em->flush();
            $request->getSession()->remove('face_token');
            return $this->json(['success' => true]);
        }
        
        return $this->json(['success' => false, 'message' => 'Aucun token']);
    }
}