<?php
namespace App\Security;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\CustomCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class PlaintextAuthenticator extends AbstractAuthenticator
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private RouterInterface $router
    ) {}

    public function supports(Request $request): ?bool
    {
        return $request->getPathInfo() === '/login' && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $password = $request->request->get('password', '');

        return new Passport(
            new UserBadge($email, function($userEmail) {
                $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $userEmail]);
                if (!$user) {
                    throw new CustomUserMessageAuthenticationException('Email inconnu.');
                }
                return $user;
            }),
            new CustomCredentials(function($credentials, $user) {
                // Comparaison en clair
                if ($credentials !== $user->getPassword()) {
                    throw new CustomUserMessageAuthenticationException('Mot de passe incorrect.');
                }
                return true;
            }, $password)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        $role = $user->getRole();

        // Redirection selon le rôle
        $route = match($role) {
            'Admin' => 'app_dashboard_admin',
            'Psychologue' => 'app_dashboard_psychologue',
            'Patient' => 'app_dashboard_patient',
            default => 'app_login',
        };

        return new RedirectResponse($this->router->generate($route));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $request->getSession()->set('_security.last_error', $exception->getMessage());
        return new RedirectResponse($this->router->generate('app_login'));
    }
}