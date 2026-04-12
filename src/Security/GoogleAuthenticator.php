<?php

namespace App\Security;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Psr\Log\LoggerInterface;

class GoogleAuthenticator extends OAuth2Authenticator implements AuthenticationEntryPointInterface
{
    private ClientRegistry $clientRegistry;
    private EntityManagerInterface $entityManager;
    private RouterInterface $router;
    private LoggerInterface $logger;

    public function __construct(
        ClientRegistry $clientRegistry, 
        EntityManagerInterface $entityManager,
        RouterInterface $router,
        LoggerInterface $logger
    ) {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->logger = $logger;
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
                $googleId = $googleUser->getId();
                $firstName = $googleUser->getFirstName() ?? '';
                $lastName = $googleUser->getLastName() ?? '';
                
                $this->logger->info('Google user data', [
                    'email' => $email,
                    'google_id' => $googleId,
                ]);
                
                $existingUser = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);
                
                if ($existingUser) {
                    $this->logger->info('Existing user found', ['user_id' => $existingUser->getId()]);
                    if (!$existingUser->getGoogleId()) {
                        $existingUser->setGoogleId($googleId);
                        $this->entityManager->flush();
                    }
                    return $existingUser;
                }
                
                $this->logger->info('Creating new user');
                $user = new Users();
                $user->setEmail($email);
                $user->setGoogleId($googleId);
                $user->setPrenom($firstName);
                $user->setNom($lastName);
                $user->setAge(0);
                $user->setRoles([Users::ROLE_PATIENT]);
                $user->setPassword(bin2hex(random_bytes(32)));
                
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                
                return $user;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        $roles = $user->getRoles();
        
        $this->logger->info('Authentication SUCCESS', [
            'email' => $user->getEmail(),
            'roles' => $roles,
        ]);
        
        // Utilisez RedirectResponse avec router->generate() au lieu de redirectToRoute()
        if (in_array('ROLE_ADMIN', $roles)) {
            $this->logger->info('Redirecting to ADMIN dashboard');
            return new RedirectResponse($this->router->generate('app_admin_dashboard'));
        } elseif (in_array('ROLE_PSYCHOLOGUE', $roles)) {
            $this->logger->info('Redirecting to PSYCHOLOGUE dashboard');
            return new RedirectResponse($this->router->generate('app_psychologue_dashboard'));
        } else {
            $this->logger->info('Redirecting to PATIENT dashboard');
            return new RedirectResponse($this->router->generate('app_patient_dashboard'));
        }
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $this->logger->error('Authentication FAILURE', [
            'message' => $exception->getMessage()
        ]);
        
        return new RedirectResponse($this->router->generate('app_login'));
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new RedirectResponse($this->router->generate('app_login'));
    }
}