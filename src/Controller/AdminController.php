<?php
// src/Controller/AdminController.php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\UserHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/users/list', name: 'app_admin_users_list', methods: ['GET'])]
    public function getUsersList(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(Users::class)->findAll();
        $data = [];
        
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'age' => $user->getAge(),
                'role' => $user->getRoles(),
                'fullName' => $user->getFullName(),
            ];
        }
        
        return $this->json(['users' => $data]);
    }

    #[Route('/history/list', name: 'app_admin_history_list', methods: ['GET'])]
    public function getHistoryList(EntityManagerInterface $entityManager): Response
    {
        $history = $entityManager->getRepository(UserHistory::class)->findBy([], ['createdAt' => 'DESC']);
        $data = [];
        
        foreach ($history as $item) {
            $user = $entityManager->getRepository(Users::class)->find($item->getUserId());
            $userName = $user ? $user->getFullName() : 'Utilisateur inconnu';
            
            $modifiedBy = $entityManager->getRepository(Users::class)->find($item->getModifiedBy());
            $modifiedByName = $modifiedBy ? $modifiedBy->getFullName() : 'Système';
            
            $data[] = [
                'id' => $item->getId(),
                'userId' => $item->getUserId(),
                'userName' => $userName,
                'actionType' => $item->getActionType(),
                'fieldName' => $item->getFieldName(),
                'oldValue' => $item->getOldValue(),
                'newValue' => $item->getNewValue(),
                'modifiedBy' => $item->getModifiedBy(),
                'modifiedByName' => $modifiedByName,
                'ipAddress' => $item->getIpAddress(),
                'userAgent' => $item->getUserAgent(),
                'createdAt' => $item->getCreatedAt()->format('d/m/Y H:i:s'),
            ];
        }
        
        return $this->json(['history' => $data]);
    }

    #[Route('/user/{id}/edit', name: 'app_admin_user_edit', methods: ['GET', 'POST'])]
    public function editUser(int $id, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $entityManager->getRepository(Users::class)->find($id);
        
        if (!$user) {
            $this->addFlash('error', ' Utilisateur non trouvé');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        if ($request->isMethod('POST')) {
            $oldNom = $user->getNom();
            $oldPrenom = $user->getPrenom();
            $oldAge = $user->getAge();
            $oldEmail = $user->getEmail();
            $oldRole = $user->getRoles()[0] ?? 'ROLE_PATIENT';
            
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $age = $request->request->get('age');
            $email = $request->request->get('email');
            $role = $request->request->get('role');
            $newPassword = $request->request->get('password');
            
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setAge($age);
            $user->setEmail($email);
            $user->setRoles([$role]);
            
            if (!empty($newPassword) && strlen($newPassword) >= 6) {
                $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
            }
            
            $entityManager->flush();
            
            $history = new UserHistory();
            $history->setUserId($user->getId());
            $history->setActionType('edit');
            $history->setFieldName('informations');
            $history->setOldValue("Anciennes valeurs: Nom: $oldNom, Prénom: $oldPrenom, Âge: $oldAge, Email: $oldEmail");
            $history->setNewValue("Nouvelles valeurs: Nom: $nom, Prénom: $prenom, Âge: $age, Email: $email, Rôle: $role");
            $history->setModifiedBy($this->getUser()->getId());
            $history->setIpAddress($request->getClientIp());
            $history->setUserAgent($request->headers->get('User-Agent'));
            $history->setCreatedAt(new \DateTime());  // ← CORRIGÉ
            $entityManager->persist($history);
            $entityManager->flush();
            
            $this->addFlash('success', ' Utilisateur modifié avec succès !');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        return $this->render('admin/edit_user.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/user/{id}/delete', name: 'app_admin_user_delete', methods: ['POST'])]
    public function deleteUser(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(Users::class)->find($id);
        
        if (!$user) {
            $this->addFlash('error', ' Utilisateur non trouvé');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        if ($user->getId() === $this->getUser()->getId()) {
            $this->addFlash('error', ' Vous ne pouvez pas supprimer votre propre compte');
            return $this->redirectToRoute('app_admin_dashboard');
        }
        
        $userName = $user->getFullName();
        $userId = $user->getId();
        
        $history = new UserHistory();
        $history->setUserId($userId);
        $history->setActionType('delete');
        $history->setFieldName(null);
        $history->setOldValue(null);
        $history->setNewValue("Suppression de l'utilisateur: $userName (ID: $userId)");
        $history->setModifiedBy($this->getUser()->getId());
        $history->setIpAddress($request->getClientIp());
        $history->setUserAgent($request->headers->get('User-Agent'));
        $history->setCreatedAt(new \DateTime());  // ← CORRIGÉ
        $entityManager->persist($history);
        $entityManager->flush();
        
        $entityManager->remove($user);
        $entityManager->flush();
        
        $this->addFlash('success', ' Utilisateur supprimé avec succès');
        return $this->redirectToRoute('app_admin_dashboard');
    }
}