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

/* auth/log9dim.html.twig */
class __TwigTemplate_978beb35f0a1600607f5a94a64a749a3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/log9dim.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/log9dim.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion | PSYDESK</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #967bb0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            animation: fadeInUp 0.6s ease;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-left {
            background: linear-gradient(135deg, #8192df 0%, #a15de4 100%);
            padding: 50px;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        .logo-center { margin-bottom: 30px; }
        .logo-img { max-width: 180px; height: auto; display: inline-block; }
        .login-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .login-left p { opacity: 0.9; line-height: 1.6; }
        .feature-list { margin-top: 40px; text-align: left; }
        .feature-item { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .feature-item i { font-size: 22px; }
        .feature-item span { font-size: 16px; }
        .login-right { padding: 40px; width: 50%; background: white; }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #788adb;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-control.is-invalid {
            border-color: #ba6dbb;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc2626'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc2626' stroke='none'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .form-control.is-valid {
            border-color: #b910b9;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2310b981' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .invalid-feedback { color: #dc69cf; font-size: 12px; margin-top: 5px; display: block; }
        .valid-feedback { color: #d790d4; font-size: 12px; margin-top: 5px; display: block; }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #1e293b; }
        .form-check { display: flex; align-items: center; gap: 8px; margin: 15px 0; }
        .form-check-input { width: 18px; height: 18px; cursor: pointer; }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        
        /* Bouton Google */
        .btn-google {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            color: #688fcd;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }
        .btn-google:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #fa60f5;
        }
        .btn-google img {
            width: 20px;
            height: 20px;
        }
        
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }
        .separator hr {
            flex: 1;
            border: none;
            border-top: 1px solid #e2e8f0;
        }
        .separator span {
            padding: 0 10px;
            color: #94a3b8;
            font-size: 12px;
        }
        
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-danger { background: #fee2e2; color: #cc70bd; border: none; }
        .alert-success { background: #cf8dbd; color: #c97ec0; border: none; }
        .text-decoration-none { text-decoration: none; }
        
        @media (max-width: 768px) {
            .login-card { flex-direction: column; }
            .login-left, .login-right { width: 100%; }
            .login-left { padding: 30px; }
            .logo-img { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"login-card\">
        <div class=\"login-left\">
            <div>
                <div class=\"logo-center\">
                    <img src=\"";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/psydesk-logo.png"), "html", null, true);
        yield "\" alt=\"PSYDESK\" class=\"logo-img\">
                </div>
                <h2>Bienvenue sur PSYDESK !</h2>
                <p>votre bien être notre priorité!</p>
                <p>La plateforme de gestion pour psychologues et patients.</p>
            </div>
            <div class=\"feature-list\">
                <div class=\"feature-item\"><i class=\"ri-shield-check-line\"></i><span>Connexion sécurisée</span></div>
                <div class=\"feature-item\"><i class=\"ri-user-star-line\"></i><span>Espace personnalisé</span></div>
                <div class=\"feature-item\"><i class=\"ri-customer-service-line\"></i><span>Support 24/7</span></div>
            </div>
        </div>
        <div class=\"login-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #d56ec8;\">Connexion</h3>
            
            ";
        // line 180
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 180, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 181
            yield "                <div class=\"alert alert-danger\">
                    <i class=\"ri-alert-line me-2\"></i>
                    ";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 183, $this->source); })()), "messageKey", [], "any", false, false, false, 183), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 183, $this->source); })()), "messageData", [], "any", false, false, false, 183), "security"), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 186
        yield "            
            ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 187, $this->source); })()), "flashes", ["success"], "method", false, false, false, 187));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 188
            yield "                <div class=\"alert alert-success\">
                    <i class=\"ri-checkbox-circle-line me-2\"></i>
                    ";
            // line 190
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        yield "            
            <form method=\"post\" id=\"loginForm\" novalidate>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" id=\"email\" name=\"_username\" value=\"";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 197, $this->source); })()), "html", null, true);
        yield "\" class=\"form-control\" placeholder=\"exemple@email.com\" required>
                    <div class=\"invalid-feedback\">Veuillez entrer un email valide.</div>
                    <div class=\"valid-feedback\">Email valide !</div>
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"••••••\" required minlength=\"6\">
                    <div class=\"invalid-feedback\">Le mot de passe doit contenir au moins 6 caractères.</div>
                    <div class=\"valid-feedback\">Mot de passe valide !</div>
                </div>
                
                <div class=\"form-check\">
                    <input type=\"checkbox\" name=\"_remember_me\" class=\"form-check-input\" id=\"remember\">
                    <label class=\"form-check-label\" for=\"remember\">Se souvenir de moi</label>
                </div>
                
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">
                
                <button type=\"submit\" class=\"btn-login mt-3\">
                    <i class=\"ri-login-circle-line me-2\"></i>Se connecter
                </button>
                
                <div class=\"text-center mt-4\">
                    <a href=\"";
        // line 221
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password");
        yield "\" class=\"text-decoration-none\" style=\"color: #667eea;\">Mot de passe oublié ?</a>
                </div>
                
                <div class=\"text-center mt-3\">
                    <p class=\"text-muted\">
                        Pas encore de compte ? 
                        <a href=\"";
        // line 227
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"fw-bold text-decoration-none\" style=\"color: #667eea;\">S'inscrire</a>
                    </p>
                </div>
            </form>
            
            <!-- Bouton Google -->
            <div class=\"separator\">
                <hr>
                <span>OU</span>
                <hr>
            </div>
            
            <a href=\"";
        // line 239
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("connect_google_start");
        yield "\" class=\"btn-google\">
                <img src=\"https://www.google.com/favicon.ico\" alt=\"Google\">
                Se connecter avec Google
            </a>
        </div>
    </div>
    
    <script>
        // Validation en temps réel
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        function validateEmail() {
            const email = emailInput.value;
            const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
            if (email && emailRegex.test(email)) {
                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');
                return true;
            } else if (email) {
                emailInput.classList.remove('is-valid');
                emailInput.classList.add('is-invalid');
                return false;
            }
            return false;
        }
        
        function validatePassword() {
            const password = passwordInput.value;
            if (password && password.length >= 6) {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
                return true;
            } else if (password) {
                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');
                return false;
            }
            return false;
        }
        
        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            if (!isEmailValid || !isPasswordValid) {
                e.preventDefault();
                alert('Veuillez corriger les erreurs dans le formulaire.');
            }
        });
    </script>
</body>
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
        return "auth/log9dim.html.twig";
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
        return array (  324 => 239,  309 => 227,  300 => 221,  290 => 214,  270 => 197,  264 => 193,  255 => 190,  251 => 188,  247 => 187,  244 => 186,  238 => 183,  234 => 181,  232 => 180,  214 => 165,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Connexion | PSYDESK</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #967bb0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            animation: fadeInUp 0.6s ease;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-left {
            background: linear-gradient(135deg, #8192df 0%, #a15de4 100%);
            padding: 50px;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        .logo-center { margin-bottom: 30px; }
        .logo-img { max-width: 180px; height: auto; display: inline-block; }
        .login-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .login-left p { opacity: 0.9; line-height: 1.6; }
        .feature-list { margin-top: 40px; text-align: left; }
        .feature-item { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .feature-item i { font-size: 22px; }
        .feature-item span { font-size: 16px; }
        .login-right { padding: 40px; width: 50%; background: white; }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #788adb;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-control.is-invalid {
            border-color: #ba6dbb;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc2626'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc2626' stroke='none'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .form-control.is-valid {
            border-color: #b910b9;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2310b981' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .invalid-feedback { color: #dc69cf; font-size: 12px; margin-top: 5px; display: block; }
        .valid-feedback { color: #d790d4; font-size: 12px; margin-top: 5px; display: block; }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #1e293b; }
        .form-check { display: flex; align-items: center; gap: 8px; margin: 15px 0; }
        .form-check-input { width: 18px; height: 18px; cursor: pointer; }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        
        /* Bouton Google */
        .btn-google {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            color: #688fcd;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }
        .btn-google:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #fa60f5;
        }
        .btn-google img {
            width: 20px;
            height: 20px;
        }
        
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }
        .separator hr {
            flex: 1;
            border: none;
            border-top: 1px solid #e2e8f0;
        }
        .separator span {
            padding: 0 10px;
            color: #94a3b8;
            font-size: 12px;
        }
        
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-danger { background: #fee2e2; color: #cc70bd; border: none; }
        .alert-success { background: #cf8dbd; color: #c97ec0; border: none; }
        .text-decoration-none { text-decoration: none; }
        
        @media (max-width: 768px) {
            .login-card { flex-direction: column; }
            .login-left, .login-right { width: 100%; }
            .login-left { padding: 30px; }
            .logo-img { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"login-card\">
        <div class=\"login-left\">
            <div>
                <div class=\"logo-center\">
                    <img src=\"{{ asset('assets/images/psydesk-logo.png') }}\" alt=\"PSYDESK\" class=\"logo-img\">
                </div>
                <h2>Bienvenue sur PSYDESK !</h2>
                <p>votre bien être notre priorité!</p>
                <p>La plateforme de gestion pour psychologues et patients.</p>
            </div>
            <div class=\"feature-list\">
                <div class=\"feature-item\"><i class=\"ri-shield-check-line\"></i><span>Connexion sécurisée</span></div>
                <div class=\"feature-item\"><i class=\"ri-user-star-line\"></i><span>Espace personnalisé</span></div>
                <div class=\"feature-item\"><i class=\"ri-customer-service-line\"></i><span>Support 24/7</span></div>
            </div>
        </div>
        <div class=\"login-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #d56ec8;\">Connexion</h3>
            
            {% if error %}
                <div class=\"alert alert-danger\">
                    <i class=\"ri-alert-line me-2\"></i>
                    {{ error.messageKey|trans(error.messageData, 'security') }}
                </div>
            {% endif %}
            
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success\">
                    <i class=\"ri-checkbox-circle-line me-2\"></i>
                    {{ message }}
                </div>
            {% endfor %}
            
            <form method=\"post\" id=\"loginForm\" novalidate>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" id=\"email\" name=\"_username\" value=\"{{ last_username }}\" class=\"form-control\" placeholder=\"exemple@email.com\" required>
                    <div class=\"invalid-feedback\">Veuillez entrer un email valide.</div>
                    <div class=\"valid-feedback\">Email valide !</div>
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"••••••\" required minlength=\"6\">
                    <div class=\"invalid-feedback\">Le mot de passe doit contenir au moins 6 caractères.</div>
                    <div class=\"valid-feedback\">Mot de passe valide !</div>
                </div>
                
                <div class=\"form-check\">
                    <input type=\"checkbox\" name=\"_remember_me\" class=\"form-check-input\" id=\"remember\">
                    <label class=\"form-check-label\" for=\"remember\">Se souvenir de moi</label>
                </div>
                
                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                
                <button type=\"submit\" class=\"btn-login mt-3\">
                    <i class=\"ri-login-circle-line me-2\"></i>Se connecter
                </button>
                
                <div class=\"text-center mt-4\">
                    <a href=\"{{ path('app_reset_password') }}\" class=\"text-decoration-none\" style=\"color: #667eea;\">Mot de passe oublié ?</a>
                </div>
                
                <div class=\"text-center mt-3\">
                    <p class=\"text-muted\">
                        Pas encore de compte ? 
                        <a href=\"{{ path('app_register') }}\" class=\"fw-bold text-decoration-none\" style=\"color: #667eea;\">S'inscrire</a>
                    </p>
                </div>
            </form>
            
            <!-- Bouton Google -->
            <div class=\"separator\">
                <hr>
                <span>OU</span>
                <hr>
            </div>
            
            <a href=\"{{ path('connect_google_start') }}\" class=\"btn-google\">
                <img src=\"https://www.google.com/favicon.ico\" alt=\"Google\">
                Se connecter avec Google
            </a>
        </div>
    </div>
    
    <script>
        // Validation en temps réel
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        function validateEmail() {
            const email = emailInput.value;
            const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
            if (email && emailRegex.test(email)) {
                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');
                return true;
            } else if (email) {
                emailInput.classList.remove('is-valid');
                emailInput.classList.add('is-invalid');
                return false;
            }
            return false;
        }
        
        function validatePassword() {
            const password = passwordInput.value;
            if (password && password.length >= 6) {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
                return true;
            } else if (password) {
                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');
                return false;
            }
            return false;
        }
        
        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            if (!isEmailValid || !isPasswordValid) {
                e.preventDefault();
                alert('Veuillez corriger les erreurs dans le formulaire.');
            }
        });
    </script>
</body>
</html>", "auth/log9dim.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\log9dim.html.twig");
    }
}
