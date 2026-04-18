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

/* auth/reset-password.html.twig */
class __TwigTemplate_8a36c2e8cddb2626595661ba03c43746 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/reset-password.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/reset-password.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Réinitialisation | PSYDESK</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .reset-card {
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
        .reset-left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        /* Styles pour le logo comme sur la page login */
        .sidebar-logo-container {
            margin: 20px 0;
        }
        .sidebar-logo {
            max-width: 180px;
            height: auto;
            filter: brightness(0) invert(1);
        }
        .reset-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .reset-left p { opacity: 0.9; line-height: 1.6; }
        .reset-right { padding: 40px; width: 50%; background: white; }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #1e293b; }
        .btn-reset {
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
        .btn-reset:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; border: none; }
        .alert-danger { background: #fee2e2; color: #991b1b; border: none; }
        .text-decoration-none { text-decoration: none; }
        @media (max-width: 768px) {
            .reset-card { flex-direction: column; }
            .reset-left, .reset-right { width: 100%; }
            .reset-left { padding: 30px; }
            .sidebar-logo { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"reset-card\">
        <div class=\"reset-left\">
            <div>
                <!-- Logo stylisé comme sur la page login -->
                <div class=\"sidebar-logo-container\">
                    <img src=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logop.png"), "html", null, true);
        yield "\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
                <h2>Réinitialisation</h2>
                <p>Entrez votre email et votre nouveau mot de passe.</p>
            </div>
            <div>
                <p><i class=\"ri-mail-line me-2\"></i> Entrez votre email</p>
                <p><i class=\"ri-lock-password-line me-2\"></i> Nouveau mot de passe</p>
                <p><i class=\"ri-checkbox-circle-line me-2\"></i> Confirmation</p>
            </div>
        </div>
        <div class=\"reset-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #1e293b;\">Nouveau mot de passe</h3>
            
            ";
        // line 119
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "flashes", ["success"], "method", false, false, false, 119));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 120
            yield "                <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 122
        yield "            
            ";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 123, $this->source); })()), "flashes", ["error"], "method", false, false, false, 123));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 124
            yield "                <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        yield "            
            <!-- Formulaire avec novalidate -->
            <form method=\"post\" novalidate>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"exemple@email.com\" required>
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Nouveau mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Minimum 6 caractères\" required minlength=\"6\">
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Confirmer le mot de passe</label>
                    <input type=\"password\" id=\"confirm_password\" name=\"confirm_password\" class=\"form-control\" placeholder=\"Confirmez votre mot de passe\" required>
                </div>
                
                <button type=\"submit\" class=\"btn-reset\">
                    <i class=\"ri-save-line me-2\"></i>Réinitialiser
                </button>
                
                <div class=\"text-center mt-4\">
                    <a href=\"";
        // line 149
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-decoration-none\" style=\"color: #667eea;\">Retour à la connexion</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const password = document.getElementById('password');
        const confirm = document.getElementById('confirm_password');
        
        confirm.addEventListener('input', function() {
            if (this.value !== password.value) {
                this.setCustomValidity('Les mots de passe ne correspondent pas');
                this.style.borderColor = '#dc2626';
            } else {
                this.setCustomValidity('');
                this.style.borderColor = '#10b981';
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
        return "auth/reset-password.html.twig";
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
        return array (  225 => 149,  200 => 126,  191 => 124,  187 => 123,  184 => 122,  175 => 120,  171 => 119,  151 => 102,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Réinitialisation | PSYDESK</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .reset-card {
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
        .reset-left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        /* Styles pour le logo comme sur la page login */
        .sidebar-logo-container {
            margin: 20px 0;
        }
        .sidebar-logo {
            max-width: 180px;
            height: auto;
            filter: brightness(0) invert(1);
        }
        .reset-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .reset-left p { opacity: 0.9; line-height: 1.6; }
        .reset-right { padding: 40px; width: 50%; background: white; }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #1e293b; }
        .btn-reset {
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
        .btn-reset:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; border: none; }
        .alert-danger { background: #fee2e2; color: #991b1b; border: none; }
        .text-decoration-none { text-decoration: none; }
        @media (max-width: 768px) {
            .reset-card { flex-direction: column; }
            .reset-left, .reset-right { width: 100%; }
            .reset-left { padding: 30px; }
            .sidebar-logo { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"reset-card\">
        <div class=\"reset-left\">
            <div>
                <!-- Logo stylisé comme sur la page login -->
                <div class=\"sidebar-logo-container\">
                    <img src=\"{{ asset('assets/images/logop.png') }}\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
                <h2>Réinitialisation</h2>
                <p>Entrez votre email et votre nouveau mot de passe.</p>
            </div>
            <div>
                <p><i class=\"ri-mail-line me-2\"></i> Entrez votre email</p>
                <p><i class=\"ri-lock-password-line me-2\"></i> Nouveau mot de passe</p>
                <p><i class=\"ri-checkbox-circle-line me-2\"></i> Confirmation</p>
            </div>
        </div>
        <div class=\"reset-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #1e293b;\">Nouveau mot de passe</h3>
            
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success\">{{ message }}</div>
            {% endfor %}
            
            {% for message in app.flashes('error') %}
                <div class=\"alert alert-danger\">{{ message }}</div>
            {% endfor %}
            
            <!-- Formulaire avec novalidate -->
            <form method=\"post\" novalidate>
                <div class=\"mb-3\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"exemple@email.com\" required>
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Nouveau mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Minimum 6 caractères\" required minlength=\"6\">
                </div>
                
                <div class=\"mb-3\">
                    <label class=\"form-label\">Confirmer le mot de passe</label>
                    <input type=\"password\" id=\"confirm_password\" name=\"confirm_password\" class=\"form-control\" placeholder=\"Confirmez votre mot de passe\" required>
                </div>
                
                <button type=\"submit\" class=\"btn-reset\">
                    <i class=\"ri-save-line me-2\"></i>Réinitialiser
                </button>
                
                <div class=\"text-center mt-4\">
                    <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none\" style=\"color: #667eea;\">Retour à la connexion</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const password = document.getElementById('password');
        const confirm = document.getElementById('confirm_password');
        
        confirm.addEventListener('input', function() {
            if (this.value !== password.value) {
                this.setCustomValidity('Les mots de passe ne correspondent pas');
                this.style.borderColor = '#dc2626';
            } else {
                this.setCustomValidity('');
                this.style.borderColor = '#10b981';
            }
        });
    </script>
</body>
</html>", "auth/reset-password.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\reset-password.html.twig");
    }
}
