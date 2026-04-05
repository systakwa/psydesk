<?php
// src/Controller/AdminController.php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    /**
     * API - Récupère la liste des utilisateurs en JSON
     */
    #[Route('/users/list', name: 'app_admin_users_list', methods: ['GET'])]
    public function getUsersList(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();
        $data = [];
        
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'age' => $user->getAge(),
                'roles' => $user->getRoles(),
                'fullName' => $user->getFullName(),
            ];
        }
        
        return $this->json(['users' => $data]);
    }

    /**
     * Modifier un utilisateur
     */
    #[Route('/user/{id}/edit', name: 'app_admin_user_edit', methods: ['GET', 'POST'])]
    public function editUser(int $id, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        
        if (!$user) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $age = $request->request->get('age');
            $email = $request->request->get('email');
            $role = $request->request->get('role');
            $newPassword = $request->request->get('password');
            
            // Mise à jour des informations
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setAge($age);
            $user->setEmail($email);
            $user->setRoles([$role]);
            
            // Mise à jour du mot de passe si fourni
            if (!empty($newPassword) && strlen($newPassword) >= 6) {
                $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
            }
            
            $entityManager->flush();
            
            $this->addFlash('success', '✅ Utilisateur modifié avec succès !');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        return $this->render('admin/edit_user.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * Supprimer un utilisateur
     */
    #[Route('/user/{id}/delete', name: 'app_admin_user_delete', methods: ['POST'])]
    public function deleteUser(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        
        if (!$user) {
            $this->addFlash('error', '❌ Utilisateur non trouvé');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        // Empêcher la suppression de son propre compte
        if ($user->getId() === $this->getUser()->getId()) {
            $this->addFlash('error', '⚠️ Vous ne pouvez pas supprimer votre propre compte');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        $entityManager->remove($user);
        $entityManager->flush();
        
        $this->addFlash('success', '🗑️ Utilisateur supprimé avec succès');
        return $this->redirectToRoute('app_admin_dashboard');
    }
}