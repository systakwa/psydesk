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

/* auth/login.html.twig */
class __TwigTemplate_9b3841893e4576d521e35c0265b856a6 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/login.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion|PsyDesk</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css\">
    <style>
        /* ---------- STYLE AVEC FOND BLANC ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 850px;
            max-width: 100%;
            min-height: 550px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {
            0%, 49.99% { opacity: 0; z-index: 1; }
            50%, 100% { opacity: 1; z-index: 5; }
        }

        form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
            text-align: center;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #333;
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            width: 40px;
            height: 40px;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
            width: 100%;
        }

        button:hover {
            transform: scale(0.98);
            opacity: 0.9;
        }

        a {
            color: #667eea;
            text-decoration: none;
            font-size: 13px;
            margin-top: 15px;
            display: inline-block;
        }

        .register-link {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
        }
        .register-link a {
            margin-top: 0;
            font-weight: 600;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            z-index: 10;
            border-radius: 150px 0 0 100px;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100%;
            color: white;
            position: relative;
            left: -100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 30px;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        .toggle-panel h1 {
            color: white;
            margin-bottom: 20px;
        }

        .toggle-panel p {
            font-size: 14px;
            margin-bottom: 30px;
        }

        .hidden {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 10px 30px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .hidden:hover {
            background: white;
            color: #667eea;
        }

        .sidebar-logo-container {
            margin-top: 30px;
        }

        .sidebar-logo {
            max-width: 150px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 13px;
            width: 100%;
            text-align: center;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        @media (max-width: 768px) {
            .form-container, .toggle-container {
                width: 100%;
            }
            .container.active .sign-in {
                transform: translateX(0);
            }
            .container.active .sign-up {
                transform: translateX(0);
            }
            .toggle-container {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class=\"container\" id=\"container\">
    <!-- FORMULAIRE TECHNICIEN (sign-in) -->
    <div class=\"form-container sign-in\">
        <form method=\"post\" action=\"";
        // line 300
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" novalidate>
            <h1>Connexion </h1>
            <div class=\"social-icons\">
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-google-plus-g\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-facebook-f\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-github\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-linkedin-in\"></i></a>
            </div>
            <span>ou utilisez votre email et mot de passe</span>

            ";
        // line 310
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 310, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 311
            yield "                <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 311, $this->source); })()), "messageKey", [], "any", false, false, false, 311), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 311, $this->source); })()), "messageData", [], "any", false, false, false, 311), "security"), "html", null, true);
            yield "</div>
            ";
        }
        // line 313
        yield "
            <input type=\"email\" name=\"_username\" placeholder=\"Email\" value=\"";
        // line 314
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 314, $this->source); })()), "html", null, true);
        yield "\" required>
            <input type=\"password\" name=\"_password\" placeholder=\"Mot de passe\" required>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 316
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
            <button type=\"submit\">Se connecter</button>
            <a href=\"";
        // line 318
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password");
        yield "\">Mot de passe oublié ?</a>
            
            <div class=\"register-link\">
                Pas encore de compte ? 
                <a href=\"";
        // line 322
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" style=\"color: #667eea;\">S'inscrire</a>
            </div>
        </form>
    </div>

    

    <!-- PANEL TOGGLE (deux panneaux coulissants) -->
    <div class=\"toggle-container\">
        <div class=\"toggle\">
            <!-- Panneau de gauche (apparaît quand on bascule vers réceptionniste) -->
            <div class=\"toggle-panel toggle-left\">
                <h1>Welcome Back!</h1>
                <p>Basculez vers l'espace Réceptionniste</p>
                <button class=\"hidden\" id=\"login\">Accès Réceptionniste</button>
            </div>
            <!-- Panneau de droite (visible par défaut, avec le logo) -->
            <div class=\"toggle-panel toggle-right\">
                <div class=\"sidebar-logo-container\">
                    <img src=\"";
        // line 341
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logop.png"), "html", null, true);
        yield "\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
                <h1>Bienvenue !</h1>
                <p>Connectez-vous en tant que patient ou psychologue ou admin</p>
            </div>
        </div>
    </div>
</div>

<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add(\"active\");
    });
    loginBtn.addEventListener('click', () => {
        container.classList.remove(\"active\");
    });
</script>

";
        // line 367
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 367, $this->source); })()), "flashes", ["success"], "method", false, false, false, 367));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 368
            yield "    <div style=\"position: fixed; bottom: 20px; right: 20px; z-index: 1000;\" class=\"alert alert-success\">
        ";
            // line 369
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 372
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 372, $this->source); })()), "flashes", ["error"], "method", false, false, false, 372));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 373
            yield "    <div style=\"position: fixed; bottom: 20px; right: 20px; z-index: 1000;\" class=\"alert alert-danger\">
        ";
            // line 374
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 377
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "auth/login.html.twig";
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
        return array (  471 => 377,  462 => 374,  459 => 373,  455 => 372,  446 => 369,  443 => 368,  439 => 367,  411 => 341,  389 => 322,  382 => 318,  377 => 316,  372 => 314,  369 => 313,  363 => 311,  361 => 310,  348 => 300,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/auth/login.html.twig #}
<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion|PsyDesk</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css\">
    <style>
        /* ---------- STYLE AVEC FOND BLANC ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 850px;
            max-width: 100%;
            min-height: 550px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {
            0%, 49.99% { opacity: 0; z-index: 1; }
            50%, 100% { opacity: 1; z-index: 5; }
        }

        form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
            text-align: center;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #333;
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            width: 40px;
            height: 40px;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
            width: 100%;
        }

        button:hover {
            transform: scale(0.98);
            opacity: 0.9;
        }

        a {
            color: #667eea;
            text-decoration: none;
            font-size: 13px;
            margin-top: 15px;
            display: inline-block;
        }

        .register-link {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
        }
        .register-link a {
            margin-top: 0;
            font-weight: 600;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            z-index: 10;
            border-radius: 150px 0 0 100px;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100%;
            color: white;
            position: relative;
            left: -100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 30px;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        .toggle-panel h1 {
            color: white;
            margin-bottom: 20px;
        }

        .toggle-panel p {
            font-size: 14px;
            margin-bottom: 30px;
        }

        .hidden {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 10px 30px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .hidden:hover {
            background: white;
            color: #667eea;
        }

        .sidebar-logo-container {
            margin-top: 30px;
        }

        .sidebar-logo {
            max-width: 150px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 13px;
            width: 100%;
            text-align: center;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        @media (max-width: 768px) {
            .form-container, .toggle-container {
                width: 100%;
            }
            .container.active .sign-in {
                transform: translateX(0);
            }
            .container.active .sign-up {
                transform: translateX(0);
            }
            .toggle-container {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class=\"container\" id=\"container\">
    <!-- FORMULAIRE TECHNICIEN (sign-in) -->
    <div class=\"form-container sign-in\">
        <form method=\"post\" action=\"{{ path('app_login') }}\" novalidate>
            <h1>Connexion </h1>
            <div class=\"social-icons\">
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-google-plus-g\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-facebook-f\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-github\"></i></a>
                <a href=\"#\" class=\"icon\"><i class=\"fa-brands fa-linkedin-in\"></i></a>
            </div>
            <span>ou utilisez votre email et mot de passe</span>

            {% if error %}
                <div class=\"alert alert-danger\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
            {% endif %}

            <input type=\"email\" name=\"_username\" placeholder=\"Email\" value=\"{{ last_username }}\" required>
            <input type=\"password\" name=\"_password\" placeholder=\"Mot de passe\" required>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
            <button type=\"submit\">Se connecter</button>
            <a href=\"{{ path('app_reset_password') }}\">Mot de passe oublié ?</a>
            
            <div class=\"register-link\">
                Pas encore de compte ? 
                <a href=\"{{ path('app_register') }}\" style=\"color: #667eea;\">S'inscrire</a>
            </div>
        </form>
    </div>

    

    <!-- PANEL TOGGLE (deux panneaux coulissants) -->
    <div class=\"toggle-container\">
        <div class=\"toggle\">
            <!-- Panneau de gauche (apparaît quand on bascule vers réceptionniste) -->
            <div class=\"toggle-panel toggle-left\">
                <h1>Welcome Back!</h1>
                <p>Basculez vers l'espace Réceptionniste</p>
                <button class=\"hidden\" id=\"login\">Accès Réceptionniste</button>
            </div>
            <!-- Panneau de droite (visible par défaut, avec le logo) -->
            <div class=\"toggle-panel toggle-right\">
                <div class=\"sidebar-logo-container\">
                    <img src=\"{{ asset('assets/images/logop.png') }}\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
                <h1>Bienvenue !</h1>
                <p>Connectez-vous en tant que patient ou psychologue ou admin</p>
            </div>
        </div>
    </div>
</div>

<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add(\"active\");
    });
    loginBtn.addEventListener('click', () => {
        container.classList.remove(\"active\");
    });
</script>

{# Affichage des messages flash #}
{% for message in app.flashes('success') %}
    <div style=\"position: fixed; bottom: 20px; right: 20px; z-index: 1000;\" class=\"alert alert-success\">
        {{ message }}
    </div>
{% endfor %}
{% for message in app.flashes('error') %}
    <div style=\"position: fixed; bottom: 20px; right: 20px; z-index: 1000;\" class=\"alert alert-danger\">
        {{ message }}
    </div>
{% endfor %}
</body>
</html>", "auth/login.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\login.html.twig");
    }
}
