<?php
// src/Controller/AuthController.php

namespace App\Controller;
use App\Entity\Users;
use App\Entity\UserHistory;
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
use App\Repository\ReclamationRepository;

class AuthController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->redirectToRoute('app_login');
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request, EntityManagerInterface $entityManager): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
       
        // Si l'utilisateur est déjà connecté, rediriger vers le dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }
        
        return $this->render('auth/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
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
        $user = new Users();
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

            // Enregistrer dans l'historique la création du compte
            $history = new UserHistory();
            $history->setUserId($user->getId());
            $history->setActionType('create');
            $history->setFieldName('compte');
            $history->setOldValue(null);
            $history->setNewValue("Création du compte utilisateur {$user->getFullName()} (ID: {$user->getId()}) avec le rôle " . ($selectedRole === Users::ROLE_ADMIN ? 'Administrateur' : ($selectedRole === Users::ROLE_PSYCHOLOGUE ? 'Psychologue' : 'Patient')));
            $history->setModifiedBy($user->getId());
            $history->setIpAddress($request->getClientIp());
            $history->setUserAgent($request->headers->get('User-Agent'));
            $history->setCreatedAt(new \DateTime());
            $entityManager->persist($history);
            $entityManager->flush();

            $roleName = $selectedRole === Users::ROLE_ADMIN ? 'Administrateur' : ($selectedRole === Users::ROLE_PSYCHOLOGUE ? 'Psychologue' : 'Patient');
            $this->addFlash('success', ' Votre compte a été créé avec succès ! Vous êtes inscrit en tant que ' . $roleName . '.');
            
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
            
            $user = $entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);
            
            if (!$user) {
                $this->addFlash('error', ' Aucun compte trouvé avec cet email.');
                return $this->redirectToRoute('app_reset_password');
            }
            
            if (empty($newPassword) || strlen($newPassword) < 6) {
                $this->addFlash('error', ' Le mot de passe doit contenir au moins 6 caractères.');
            } elseif ($newPassword !== $confirmPassword) {
                $this->addFlash('error', ' Les mots de passe ne correspondent pas.');
            } else {
                $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($hashedPassword);
                $entityManager->flush();
                
                // Enregistrer dans l'historique la réinitialisation
                $history = new UserHistory();
                $history->setUserId($user->getId());
                $history->setActionType('reset_password');
                $history->setFieldName('password');
                $history->setOldValue(null);
                $history->setNewValue("Réinitialisation du mot de passe pour l'utilisateur {$user->getFullName()} (ID: {$user->getId()})");
                $history->setModifiedBy($user->getId());
                $history->setIpAddress($request->getClientIp());
                $history->setUserAgent($request->headers->get('User-Agent'));
                $history->setCreatedAt(new \DateTime());
                $entityManager->persist($history);
                $entityManager->flush();
                
                $emailMessage = (new Email())
                    ->from('noreply@psydesk.com')
                    ->to($email)
                    ->subject(' Votre mot de passe a été réinitialisé')
                    ->html($this->renderView('emails/reset_password_confirmation.html.twig', [
                        'user' => $user,
                    ]));
                
                $mailer->send($emailMessage);
                
                $this->addFlash('success', ' Votre mot de passe a été réinitialisé avec succès. Un email de confirmation vous a été envoyé.');
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
        
        $role= $user->getRoles();
        
        if (in_array('ROLE_ADMIN', $role)) {
            return $this->redirectToRoute('app_admin_dashboard');
        } elseif (in_array('ROLE_PSYCHOLOGUE', $role)) {
            return $this->redirectToRoute('app_psychologue_dashboard');
        } else {
            return $this->redirectToRoute('app_patient_dashboard');
        }
    }

    #[Route('/patient/dashboard', name: 'app_patient_dashboard')]
    public function patientDashboard(): Response
    {
        $user = $this->getUser();
         $nomComplet = $user ? $user->getPrenom() . ' ' . $user->getNom() : 'Invité';
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('dashboard_p/index.html.twig', [
        //return $this->render('dashboard/admin.html.twig', [
        
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
        
        return $this->render('dashboard_psy/index.html.twig', [
            'user' => $user,
        ]);
    }

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
        
        $users = $entityManager->getRepository(Users::class)->findAll();
        
        return $this->render('dashboard/admin.html.twig', [
            'user' => $user,
            'users' => $users,
        ]);
    }

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
                        $this->addFlash('success', ' Mot de passe mis à jour avec succès.');
                        
                        // Enregistrer dans l'historique
                        $history = new UserHistory();
                        $history->setUserId($user->getId());
                        $history->setActionType('edit');
                        $history->setFieldName('password');
                        $history->setOldValue(null);
                        $history->setNewValue("Changement du mot de passe pour l'utilisateur {$user->getFullName()}");
                        $history->setModifiedBy($user->getId());
                        $history->setIpAddress($request->getClientIp());
                        $history->setUserAgent($request->headers->get('User-Agent'));
                        $history->setCreatedAt(new \DateTime());
                        $entityManager->persist($history);
                        $entityManager->flush();
                    } else {
                        $this->addFlash('error', ' Le nouveau mot de passe doit contenir au moins 6 caractères et correspondre à la confirmation.');
                    }
                } else {
                    $this->addFlash('error', ' Le mot de passe actuel est incorrect.');
                }
            }
            
            $entityManager->flush();
            $this->addFlash('success', ' Votre profil a été mis à jour avec succès.');
            
            return $this->redirectToRoute('app_profile');
        }
        
        return $this->render('auth/profile.html.twig', [
            'user' => $user
        ]);
    }

    

     /*#[Route('/dashboard/patient', name: 'app_dashboard_patient')]
    public function patientDashboard(): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté
        $nomComplet = $user ? $user->getPrenom() . ' ' . $user->getNom() : 'Invité';
        
        return $this->render('dashboard_p/index.html.twig', [
            'nom' => $nomComplet,
        ]);
    }*/


        #[Route('/dashboard/reclamation', name: 'app_reclamation')]
     //#[Route('/admin/all', name: 'app_reclamation_admin_all', methods: ['GET'])]
    public function indexAll(ReclamationRepository $reclamationRepository): Response
    {
        $reclamations = $reclamationRepository->findAll();

        return $this->render('Objectif_reclamtion_back/reclamation.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }
    
}