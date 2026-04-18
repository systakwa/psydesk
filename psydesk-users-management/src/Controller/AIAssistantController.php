<?php
// src/Controller/AIAssistantController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;

class AIAssistantController extends AbstractController
{
    #[Route('/admin/assistant', name: 'app_admin_assistant')]
    public function index(): Response
    {
        return $this->render('dashboard/admin_assistant.html.twig');
    }

    #[Route('/assistant/chat', name: 'app_assistant_chat', methods: ['POST'])]
    public function chat(Request $request, EntityManagerInterface $em): Response
    {
        $message = strtolower($request->request->get('message', ''));
        
        // Contexte de l'assistant (limité à la gestion des utilisateurs)
        $response = $this->processUserManagementCommand($message, $em);
        
        return $this->json(['response' => $response]);
    }
    
    private function processUserManagementCommand(string $message, EntityManagerInterface $em): string
    {
        // ========== COMMANDES DE POLITESSE ET FLEXIBILITÉ ==========
        
        // Salutations
        if (preg_match('/^(bonjour|salut|coucou|hello|hi|hey|bjr|bonsoir)/i', $message)) {
            $responses = [
                "👋 Bonjour ! Je suis votre assistant spécialisé dans la gestion des utilisateurs.\n\nComment puis-je vous aider aujourd'hui ? Tapez `aide` pour voir mes commandes disponibles.",
                "🤖 Bonjour ! Ravi de vous voir. Je suis là pour vous aider à gérer les utilisateurs. Que souhaitez-vous faire ?",
                "✨ Bonjour ! N'hésitez pas à me demander la liste des utilisateurs, les statistiques, ou à rechercher un utilisateur en particulier."
            ];
            return $responses[array_rand($responses)];
        }
        
        // Remerciements
        if (preg_match('/(merci|thanks|thank you|super|génial|parfait|top|nice)/i', $message)) {
            $responses = [
                "🙏 Avec plaisir ! Je reste à votre disposition pour la gestion des utilisateurs.",
                "😊 Je vous en prie ! N'hésitez pas si vous avez d'autres questions sur les utilisateurs.",
                "🤗 De rien ! C'est un plaisir de vous aider. À bientôt !",
                "👍 Service ! Si vous avez besoin d'autres informations sur les utilisateurs, je suis là.",
                "💫 Merci à vous ! N'oubliez pas que je suis spécialisé dans la gestion des utilisateurs.",
                "🌟 C'est gentil ! Je suis là pour ça. Besoin d'autre chose ?"
            ];
            return $responses[array_rand($responses)];
        }
        
        // Au revoir
        if (preg_match('/(au revoir|bye|à bientôt|ciao|adieu|salut|a plus)/i', $message)) {
            $responses = [
                "👋 Au revoir ! Si vous avez besoin d'aide pour gérer les utilisateurs, n'hésitez pas à revenir. Bonne journée !",
                "🌟 À bientôt ! Je reste disponible pour toute question sur les utilisateurs.",
                "👋 Bonne continuation ! N'oubliez pas, je suis là pour vous aider avec la gestion des utilisateurs."
            ];
            return $responses[array_rand($responses)];
        }
        
        // Comment ça va ?
        if (preg_match('/(ça va|comment ça va|comment allez vous|how are you|ca va)/i', $message)) {
            $responses = [
                "🤖 Je vais très bien, merci ! Je suis prêt à vous aider avec la gestion des utilisateurs. Que puis-je faire pour vous ?",
                "😊 Très bien, merci de demander ! Je suis opérationnel pour vous assister dans la gestion des utilisateurs.",
                "✨ Je fonctionne à plein régime ! Tapez `aide` pour voir ce que je peux faire pour vous."
            ];
            return $responses[array_rand($responses)];
        }
        
        // Félicitations / encouragement
        if (preg_match('/(bravo|super|excellent|bien joué|félicitations|parfait)/i', $message)) {
            $responses = [
                "🎉 Merci beaucoup ! Je suis là pour vous assister avec la gestion des utilisateurs. Besoin d'autre chose ?",
                "🌟 C'est gentil ! Je fais de mon mieux pour vous aider avec les utilisateurs.",
                "💪 Merci ! N'hésitez pas si vous avez d'autres demandes sur la gestion des utilisateurs."
            ];
            return $responses[array_rand($responses)];
        }
        
        // ========== COMMANDES DE GESTION DES UTILISATEURS ==========
        
        // Commandes de gestion des utilisateurs
        $commands = [
            'liste des utilisateurs' => 'list_users',
            'afficher les utilisateurs' => 'list_users',
            'tous les utilisateurs' => 'list_users',
            'voir les utilisateurs' => 'list_users',
            'nombre d\'utilisateurs' => 'count_users',
            'combien d\'utilisateurs' => 'count_users',
            'total utilisateurs' => 'count_users',
            'chercher utilisateur' => 'search_user',
            'trouver utilisateur' => 'search_user',
            'rechercher utilisateur' => 'search_user',
            'patients' => 'list_patients',
            'liste des patients' => 'list_patients',
            'psychologues' => 'list_psychologists',
            'liste des psychologues' => 'list_psychologists',
            'administrateurs' => 'list_admins',
            'liste des administrateurs' => 'list_admins',
            'statistiques utilisateurs' => 'user_stats',
            'stats utilisateurs' => 'user_stats',
            'derniers inscrits' => 'recent_users',
            'nouveaux utilisateurs' => 'recent_users',
            'aide' => 'help',
            'help' => 'help',
            'que peux-tu faire' => 'help',
            'commandes' => 'help'
        ];
        
        // Détecter la commande
        $action = null;
        foreach ($commands as $keyword => $cmd) {
            if (strpos($message, $keyword) !== false) {
                $action = $cmd;
                break;
            }
        }
        
        // Extraire un email si présent (pour recherche)
        preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $message, $emailMatch);
        $email = $emailMatch[0] ?? null;
        
        // Exécuter l'action correspondante
        switch ($action) {
            case 'list_users':
                return $this->getAllUsers($em);
            case 'count_users':
                return $this->getUserCount($em);
            case 'search_user':
                return $this->searchUser($em, $message, $email);
            case 'list_patients':
                return $this->getUsersByRole($em, 'ROLE_PATIENT', 'patients');
            case 'list_psychologists':
                return $this->getUsersByRole($em, 'ROLE_PSYCHOLOGUE', 'psychologues');
            case 'list_admins':
                return $this->getUsersByRole($em, 'ROLE_ADMIN', 'administrateurs');
            case 'user_stats':
                return $this->getUserStats($em);
            case 'recent_users':
                return $this->getRecentUsers($em);
            case 'help':
                return $this->getHelpMessage();
            default:
                return "🤔 Je n'ai pas compris votre demande.\n\n" .
                       "Je suis spécialisé dans la **gestion des utilisateurs**.\n\n" .
                       "📌 **Voici ce que je peux faire :**\n" .
                       "• `liste des utilisateurs` - Afficher tous les utilisateurs\n" .
                       "• `nombre d'utilisateurs` - Voir les statistiques\n" .
                       "• `patients` / `psychologues` / `administrateurs` - Liste par rôle\n" .
                       "• `chercher utilisateur [email]` - Rechercher un utilisateur\n" .
                       "• `statistiques utilisateurs` - Statistiques détaillées\n" .
                       "• `derniers inscrits` - Les 5 derniers inscrits\n" .
                       "• `aide` - Toutes les commandes\n\n" .
                       "💬 Vous pouvez aussi me dire `bonjour`, `merci`, `ça va` ou `au revoir` !";
        }
    }
    
    private function getAllUsers(EntityManagerInterface $em): string
    {
        $users = $em->getRepository(Users::class)->findAll();
        
        if (count($users) === 0) {
            return "📋 Aucun utilisateur n'est encore inscrit dans la base de données.";
        }
        
        $response = "📋 **Liste des utilisateurs** (" . count($users) . "):\n\n";
        foreach ($users as $user) {
            $role = $this->getRoleName($user->getRoles()[0] ?? '');
            $response .= "• {$user->getPrenom()} {$user->getNom()} - {$user->getEmail()} ({$role})\n";
        }
        
        return $response;
    }
    
    private function getUserCount(EntityManagerInterface $em): string
    {
        $users = $em->getRepository(Users::class)->findAll();
        $patients = array_filter($users, fn($u) => in_array('ROLE_PATIENT', $u->getRoles()));
        $psychologues = array_filter($users, fn($u) => in_array('ROLE_PSYCHOLOGUE', $u->getRoles()));
        $admins = array_filter($users, fn($u) => in_array('ROLE_ADMIN', $u->getRoles()));
        
        return "📊 **Statistiques des utilisateurs:**\n" .
               "• Total: " . count($users) . " utilisateurs\n" .
               "• Patients: " . count($patients) . "\n" .
               "• Psychologues: " . count($psychologues) . "\n" .
               "• Administrateurs: " . count($admins);
    }
    
    private function searchUser(EntityManagerInterface $em, string $message, ?string $email): string
    {
        if ($email) {
            $user = $em->getRepository(Users::class)->findOneBy(['email' => $email]);
            if ($user) {
                $role = $this->getRoleName($user->getRoles()[0] ?? '');
                $hasPhoto = $user->getImage() ? "✅ Oui" : "❌ Non";
                $hasFace = $user->getFaceToken() ? "✅ Oui" : "❌ Non";
                
                return "👤 **Utilisateur trouvé:**\n" .
                       "• Nom: {$user->getPrenom()} {$user->getNom()}\n" .
                       "• Email: {$user->getEmail()}\n" .
                       "• Rôle: {$role}\n" .
                       "• Âge: {$user->getAge()} ans\n" .
                       "• ID: {$user->getId()}\n" .
                       "• Photo de profil: {$hasPhoto}\n" .
                       "• Reconnaissance faciale: {$hasFace}";
            }
            return "❌ Aucun utilisateur trouvé avec l'email: {$email}";
        }
        
        // Recherche par nom ou prénom
        $users = $em->getRepository(Users::class)->findAll();
        $results = [];
        foreach ($users as $user) {
            if (stripos($user->getNom(), $message) !== false || 
                stripos($user->getPrenom(), $message) !== false) {
                $results[] = $user;
            }
        }
        
        if (count($results) === 0) {
            return "❌ Aucun utilisateur trouvé correspondant à votre recherche.";
        }
        
        $response = "🔍 **Résultats de recherche** (" . count($results) . "):\n\n";
        foreach ($results as $user) {
            $role = $this->getRoleName($user->getRoles()[0] ?? '');
            $response .= "• {$user->getPrenom()} {$user->getNom()} - {$user->getEmail()} ({$role})\n";
        }
        
        return $response;
    }
    
    private function getUsersByRole(EntityManagerInterface $em, string $role, string $label): string
    {
        $users = $em->getRepository(Users::class)->findAll();
        $filtered = array_filter($users, function($user) use ($role) {
            return in_array($role, $user->getRoles());
        });
        
        if (count($filtered) === 0) {
            return "📋 Aucun {$label} n'est inscrit dans la base de données.";
        }
        
        $response = "📋 **Liste des {$label}** (" . count($filtered) . "):\n\n";
        foreach ($filtered as $user) {
            $response .= "• {$user->getPrenom()} {$user->getNom()} - {$user->getEmail()}\n";
        }
        
        return $response;
    }
    
    private function getUserStats(EntityManagerInterface $em): string
    {
        $users = $em->getRepository(Users::class)->findAll();
        
        $ageTotal = 0;
        $ageCount = 0;
        $withPhoto = 0;
        $withFace = 0;
        
        foreach ($users as $user) {
            if ($user->getAge()) {
                $ageTotal += $user->getAge();
                $ageCount++;
            }
            if ($user->getImage()) {
                $withPhoto++;
            }
            if ($user->getFaceToken()) {
                $withFace++;
            }
        }
        
        $ageMoyen = $ageCount > 0 ? round($ageTotal / $ageCount) : 0;
        
        return "📈 **Statistiques détaillées:**\n" .
               "• Total utilisateurs: " . count($users) . "\n" .
               "• Âge moyen: " . $ageMoyen . " ans\n" .
               "• Utilisateurs avec photo: " . $withPhoto . "\n" .
               "• Utilisateurs avec reconnaissance faciale: " . $withFace;
    }
    
    private function getRecentUsers(EntityManagerInterface $em): string
    {
        $users = $em->getRepository(Users::class)->findBy([], ['id' => 'DESC'], 5);
        
        if (count($users) === 0) {
            return "📋 Aucun utilisateur récent.";
        }
        
        $response = "🆕 **5 derniers inscrits:**\n\n";
        foreach ($users as $user) {
            $role = $this->getRoleName($user->getRoles()[0] ?? '');
            $response .= "• {$user->getPrenom()} {$user->getNom()} - {$user->getEmail()} ({$role})\n";
        }
        
        return $response;
    }
    
    private function getRoleName(string $role): string
    {
        return match($role) {
            'ROLE_ADMIN' => 'Administrateur',
            'ROLE_PSYCHOLOGUE' => 'Psychologue',
            'ROLE_PATIENT' => 'Patient',
            default => 'Inconnu'
        };
    }
    
    private function getHelpMessage(): string
    {
        return "🤖 **Assistant Gestion Utilisateurs PSYDESK**\n\n" .
               "Je suis spécialisé uniquement dans la gestion des utilisateurs.\n\n" .
               "📌 **Commandes disponibles:**\n" .
               "• `liste des utilisateurs` - Affiche tous les utilisateurs\n" .
               "• `nombre d'utilisateurs` - Statistiques générales\n" .
               "• `chercher utilisateur [email ou nom]` - Recherche un utilisateur\n" .
               "• `patients` / `psychologues` / `administrateurs` - Liste par rôle\n" .
               "• `statistiques utilisateurs` - Statistiques détaillées\n" .
               "• `derniers inscrits` - Les 5 derniers inscrits\n" .
               "• `aide` - Affiche cette aide\n\n" .
               "💬 Vous pouvez aussi me dire `bonjour`, `merci`, `ça va` ou `au revoir` !\n\n" .
               "⚠️ Je ne réponds qu'aux questions sur la gestion des utilisateurs.";
    }
}