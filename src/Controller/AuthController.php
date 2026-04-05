<?php
// src/Controller/AuthController.php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class AuthController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->redirectToRoute('app_login');
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('auth/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method is intercepted by the logout key in your firewall.');
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedRole = $form->get('role')->getData();
            $user->setRoles([$selectedRole]);
            
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            
            $entityManager->persist($user);
            $entityManager->flush();

            $roleName = $selectedRole === User::ROLE_ADMIN ? 'Administrateur' : ($selectedRole === User::ROLE_PSYCHOLOGUE ? 'Psychologue' : 'Patient');
            $this->addFlash('success', '✅ Votre compte a été créé avec succès ! Vous êtes inscrit en tant que ' . $roleName . '.');
            
            return $this->redirectToRoute('app_login');
        }

        return $this->render('auth/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/reset-password', name: 'app_reset_password')]
    public function resetPassword(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $newPassword = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm_password');
            
            $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            
            if (!$user) {
                $this->addFlash('error', '❌ Aucun compte trouvé avec cet email.');
                return $this->redirectToRoute('app_reset_password');
            }
            
            if (empty($newPassword) || strlen($newPassword) < 6) {
                $this->addFlash('error', '❌ Le mot de passe doit contenir au moins 6 caractères.');
            } elseif ($newPassword !== $confirmPassword) {
                $this->addFlash('error', '❌ Les mots de passe ne correspondent pas.');
            } else {
                $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($hashedPassword);
                $entityManager->flush();
                
                $emailMessage = (new Email())
                    ->from('noreply@psydesk.com')
                    ->to($email)
                    ->subject('✅ Votre mot de passe a été réinitialisé')
                    ->html($this->renderView('emails/reset_password_confirmation.html.twig', [
                        'user' => $user,
                    ]));
                
                $mailer->send($emailMessage);
                
                $this->addFlash('success', '✅ Votre mot de passe a été réinitialisé avec succès. Un email de confirmation vous a été envoyé.');
                return $this->redirectToRoute('app_login');
            }
        }
        
        return $this->render('auth/reset-password.html.twig');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $roles = $user->getRoles();
        
        if (in_array('ROLE_ADMIN', $roles)) {
            return $this->redirectToRoute('app_admin_dashboard');
        } elseif (in_array('ROLE_PSYCHOLOGUE', $roles)) {
            return $this->redirectToRoute('app_psychologue_dashboard');
        } else {
            return $this->redirectToRoute('app_patient_dashboard');
        }
    }

    #[Route('/patient/dashboard', name: 'app_patient_dashboard')]
    public function patientDashboard(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('dashboard/patient.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/psychologue/dashboard', name: 'app_psychologue_dashboard')]
    public function psychologueDashboard(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('dashboard/psychologue.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * Page des statistiques pour le psychologue
     */
    #[Route('/psychologue/statistiques', name: 'app_psychologue_statistiques')]
    public function psychologueStatistiques(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('dashboard/psychologue_statistiques.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    public function adminDashboard(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $users = $entityManager->getRepository(User::class)->findAll();
        
        return $this->render('dashboard/admin.html.twig', [
            'user' => $user,
            'users' => $users,
        ]);
    }

    /**
     * Page de modification du profil utilisateur
     */
    #[Route('/profile', name: 'app_profile')]
    public function profile(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $age = $request->request->get('age');
            $email = $request->request->get('email');
            
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setAge($age);
            $user->setEmail($email);
            
            $currentPassword = $request->request->get('current_password');
            $newPassword = $request->request->get('new_password');
            $confirmPassword = $request->request->get('confirm_password');
            
            if (!empty($newPassword)) {
                if ($passwordHasher->isPasswordValid($user, $currentPassword)) {
                    if ($newPassword === $confirmPassword && strlen($newPassword) >= 6) {
                        $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
                        $this->addFlash('success', '✅ Mot de passe mis à jour avec succès.');
                    } else {
                        $this->addFlash('error', '❌ Le nouveau mot de passe doit contenir au moins 6 caractères et correspondre à la confirmation.');
                    }
                } else {
                    $this->addFlash('error', '❌ Le mot de passe actuel est incorrect.');
                }
            }
            
            $entityManager->flush();
            $this->addFlash('success', '✅ Votre profil a été mis à jour avec succès.');
            
            return $this->redirectToRoute('app_profile');
        }
        
        return $this->render('auth/profile.html.twig', [
            'user' => $user
        ]);
    }
}