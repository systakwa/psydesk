<?php

namespace App\Security;

use App\Entity\Users;  // ← Changement ici (User → Users)
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class GoogleAuthenticator extends OAuth2Authenticator implements AuthenticationEntryPointInterface
{
    private ClientRegistry $clientRegistry;
    private EntityManagerInterface $entityManager;
    private RouterInterface $router;

    public function __construct(
        ClientRegistry $clientRegistry, 
        EntityManagerInterface $entityManager,
        RouterInterface $router
    ) {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        $client = $this->clientRegistry->getClient('google');
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function() use ($accessToken, $client) {
                /** @var GoogleUser $googleUser */
                $googleUser = $client->fetchUserFromToken($accessToken);
                
                $email = $googleUser->getEmail();
                
                // Vérifier si l'utilisateur existe (utilisez Users::class)
                $existingUser = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);
                
                if ($existingUser) {
                    // Met à jour le google_id si nécessaire
                    if (!$existingUser->getGoogleId()) {
                        $existingUser->setGoogleId($googleUser->getId());
                        $this->entityManager->flush();
                    }
                    return $existingUser;
                }
                
                // Créer un nouvel utilisateur
                $user = new Users();  // ← Changement ici
                $user->setEmail($email);
                $user->setGoogleId($googleUser->getId());
                $user->setRoles([Users::ROLE_PATIENT]);  // ← Utilisez la constante de votre entité
                
                // Adapter aux noms de champs de votre entité Users
                // Votre entité utilise 'prenom' et 'nom', pas 'firstname'/'lastname'
                $user->setPrenom($googleUser->getFirstName() ?? '');
                $user->setNom($googleUser->getLastName() ?? '');
                
                // Définir un âge par défaut (si le champ est requis)
                $user->setAge(0);  // Valeur temporaire
                
                // Générer un mot de passe aléatoire
                $user->setPassword(bin2hex(random_bytes(32)));
                
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                
                return $user;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Rediriger vers la page d'accueil après connexion réussie
        // Changez 'app_home' par une route qui existe dans votre application
        // Par exemple : 'app_dashboard', 'home', ou '/'
        try {
            return new Response($this->router->generate('app_home'));
        } catch (\Exception $e) {
            // Si la route n'existe pas, rediriger vers la page de connexion
            return new Response($this->router->generate('app_login'));
        }
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        // Rediriger vers la page de connexion en cas d'échec
        return new Response($this->router->generate('app_login'));
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new Response($this->router->generate('app_login'));
    }
}