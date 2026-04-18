<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* auth/logout.html.twig */
class __TwigTemplate_699cc867f109cfecd9f94b5ca4aa9b99 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 3
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/logout.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/logout.html.twig"));

        $this->parent = $this->load("base.html.twig", 3);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Déconnexion | Velonic Premium";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        yield "<div class=\"container min-vh-100 d-flex align-items-center justify-content-center py-5\">
    <div class=\"row justify-content-center w-100\">
        <div class=\"col-xxl-6 col-lg-8\">
            <div class=\"glass-card fade-in-up text-center p-5\">
                <!-- Animation de déconnexion -->
                <div class=\"mb-4\">
                    <div class=\"mx-auto\" style=\"width: 120px; height: 120px; background: linear-gradient(135deg, #d160d3 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: pulse 2s infinite;\">
                        <i class=\"ri-logout-box-r-line text-white fs-1\"></i>
                    </div>
                </div>

                <!-- Titre -->
                <h2 class=\"display-5 fw-bold mb-3\" style=\"background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;\">
                    À bientôt !
                </h2>
                
                <p class=\"fs-5 text-muted mb-4\">
                    Vous avez été déconnecté avec succès.
                </p>

                <!-- Message de redirection -->
                <div class=\"alert alert-info rounded-3 mb-4\" role=\"alert\">
                    <i class=\"ri-information-line me-2\"></i>
                    Redirection automatique vers la page de connexion dans 
                    <strong><span id=\"countdown\">5</span> secondes</strong>
                </div>

                <!-- Boutons d'action -->
                <div class=\"d-flex gap-3 justify-content-center flex-wrap\">
                    <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"btn-premium\">
                        <i class=\"ri-login-circle-line me-2\"></i>
                        Se reconnecter
                    </a>
                    <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn-outline-premium\">
                        <i class=\"ri-home-line me-2\"></i>
                        Retour à l'accueil
                    </a>
                </div>

                <!-- Footer du message -->
                <div class=\"mt-4 pt-3\">
                    <p class=\"text-muted small mb-0\">
                        <i class=\"ri-shield-check-line text-success me-1\"></i>
                        Vos données sont sécurisées
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(99,102,241,0.4);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 20px rgba(99,102,241,0);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(99,102,241,0);
        }
    }
    
    .btn-outline-premium {
        background: transparent;
        border: 2px solid #191deb;
        color: #4244d5;
        padding: 12px 25px;
        border-radius: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-outline-premium:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-radius: 30px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    @media (max-width: 768px) {
        .glass-card {
            margin: 20px;
            padding: 30px 20px !important;
        }
        
        .display-5 {
            font-size: 2rem;
        }
    }
</style>

<script>
    // Compte à rebours pour redirection automatique
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');
    
    if (countdownElement) {
        const interval = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;
            
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = \"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\";
            }
        }, 1000);
    }
    
    // Animation supplémentaire
    document.addEventListener('DOMContentLoaded', function() {
        const card = document.querySelector('.glass-card');
        if (card) {
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = 'fadeInUp 0.6s ease';
            }, 10);
        }
    });
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "auth/logout.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  227 => 127,  138 => 41,  131 => 37,  100 => 8,  87 => 7,  64 => 5,  41 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/auth/logout.html.twig #}

{% extends 'base.html.twig' %}

{% block title %}Déconnexion | Velonic Premium{% endblock %}

{% block body %}
<div class=\"container min-vh-100 d-flex align-items-center justify-content-center py-5\">
    <div class=\"row justify-content-center w-100\">
        <div class=\"col-xxl-6 col-lg-8\">
            <div class=\"glass-card fade-in-up text-center p-5\">
                <!-- Animation de déconnexion -->
                <div class=\"mb-4\">
                    <div class=\"mx-auto\" style=\"width: 120px; height: 120px; background: linear-gradient(135deg, #d160d3 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: pulse 2s infinite;\">
                        <i class=\"ri-logout-box-r-line text-white fs-1\"></i>
                    </div>
                </div>

                <!-- Titre -->
                <h2 class=\"display-5 fw-bold mb-3\" style=\"background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;\">
                    À bientôt !
                </h2>
                
                <p class=\"fs-5 text-muted mb-4\">
                    Vous avez été déconnecté avec succès.
                </p>

                <!-- Message de redirection -->
                <div class=\"alert alert-info rounded-3 mb-4\" role=\"alert\">
                    <i class=\"ri-information-line me-2\"></i>
                    Redirection automatique vers la page de connexion dans 
                    <strong><span id=\"countdown\">5</span> secondes</strong>
                </div>

                <!-- Boutons d'action -->
                <div class=\"d-flex gap-3 justify-content-center flex-wrap\">
                    <a href=\"{{ path('app_login') }}\" class=\"btn-premium\">
                        <i class=\"ri-login-circle-line me-2\"></i>
                        Se reconnecter
                    </a>
                    <a href=\"{{ path('app_home') }}\" class=\"btn-outline-premium\">
                        <i class=\"ri-home-line me-2\"></i>
                        Retour à l'accueil
                    </a>
                </div>

                <!-- Footer du message -->
                <div class=\"mt-4 pt-3\">
                    <p class=\"text-muted small mb-0\">
                        <i class=\"ri-shield-check-line text-success me-1\"></i>
                        Vos données sont sécurisées
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(99,102,241,0.4);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 20px rgba(99,102,241,0);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(99,102,241,0);
        }
    }
    
    .btn-outline-premium {
        background: transparent;
        border: 2px solid #191deb;
        color: #4244d5;
        padding: 12px 25px;
        border-radius: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-outline-premium:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-radius: 30px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    @media (max-width: 768px) {
        .glass-card {
            margin: 20px;
            padding: 30px 20px !important;
        }
        
        .display-5 {
            font-size: 2rem;
        }
    }
</style>

<script>
    // Compte à rebours pour redirection automatique
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');
    
    if (countdownElement) {
        const interval = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;
            
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = \"{{ path('app_login') }}\";
            }
        }, 1000);
    }
    
    // Animation supplémentaire
    document.addEventListener('DOMContentLoaded', function() {
        const card = document.querySelector('.glass-card');
        if (card) {
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = 'fadeInUp 0.6s ease';
            }, 10);
        }
    });
</script>
{% endblock %}", "auth/logout.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\logout.html.twig");
    }
}
