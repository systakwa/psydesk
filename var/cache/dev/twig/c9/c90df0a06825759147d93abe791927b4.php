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

/* auth/regis9dim.html.twig */
class __TwigTemplate_53e178d3888426c10e2e7e276e266629 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/regis9dim.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/regis9dim.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription | PSYDESK</title>
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
        .register-card {
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
        .register-left {
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
        .register-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .register-left p { opacity: 0.9; line-height: 1.6; }
        .feature-list { margin-top: 40px; text-align: left; }
        .feature-item { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .feature-item i { font-size: 22px; }
        .feature-item span { font-size: 16px; }
        .register-right { padding: 40px; width: 50%; background: white; }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #cd4cad;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #a767a1;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc2626'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc2626' stroke='none'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .form-control.is-valid, .form-select.is-valid {
            border-color: #b54cac;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2310b981' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .invalid-feedback { color: #6389fc; font-size: 12px; margin-top: 5px; display: block; }
        .valid-feedback { color: #6389fc; font-size: 12px; margin-top: 5px; display: block; }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #c26fb6; }
        .btn-register {
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
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-4 { margin-bottom: 20px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; border: none; }
        .text-decoration-none { text-decoration: none; }
        @media (max-width: 768px) {
            .register-card { flex-direction: column; }
            .register-left, .register-right { width: 100%; }
            .register-left { padding: 30px; }
            .sidebar-logo { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"register-card\">
        <div class=\"register-left\">
            <div>
                <h2>Inscription</h2>
                <p>Rejoignez notre communauté et profitez de tous nos services.</p>
                <!-- Conteneur du logo stylisé comme sur la page login -->
                <div class=\"sidebar-logo-container\">
                    <img src=\"";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logop.png"), "html", null, true);
        yield "\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
            </div>
            <div class=\"feature-list\">
                <div class=\"feature-item\"><i class=\"ri-checkbox-circle-line\"></i><span>Accès illimité</span></div>
                <div class=\"feature-item\"><i class=\"ri-shield-star-line\"></i><span>Sécurisé</span></div>
                <div class=\"feature-item\"><i class=\"ri-customer-service-line\"></i><span>Support 24/7</span></div>
            </div>
        </div>
        <div class=\"register-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #1e293b;\">Créez votre compte</h3>
            
            ";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 139, $this->source); })()), "flashes", ["success"], "method", false, false, false, 139));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 140
            yield "                <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        yield "            
            ";
        // line 143
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 143, $this->source); })()), 'form_start', ["attr" => ["id" => "registerForm", "novalidate" => "novalidate"]]);
        yield "
                <div style=\"display: flex; gap: 15px; margin-bottom: 15px;\">
                    <div style=\"flex: 1;\">
                        ";
        // line 146
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 146, $this->source); })()), "nom", [], "any", false, false, false, 146), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Nom"]);
        yield "
                        ";
        // line 147
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 147, $this->source); })()), "nom", [], "any", false, false, false, 147), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Dupont", "id" => "nom", "minlength" => "2"]]);
        yield "
                        <div class=\"invalid-feedback\">Le nom doit contenir au moins 2 caractères.</div>
                        <div class=\"valid-feedback\">Nom valide !</div>
                        ";
        // line 150
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 150, $this->source); })()), "nom", [], "any", false, false, false, 150), 'errors');
        yield "
                    </div>
                    <div style=\"flex: 1;\">
                        ";
        // line 153
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 153, $this->source); })()), "prenom", [], "any", false, false, false, 153), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Prénom"]);
        yield "
                        ";
        // line 154
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 154, $this->source); })()), "prenom", [], "any", false, false, false, 154), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Jean", "id" => "prenom", "minlength" => "2"]]);
        yield "
                        <div class=\"invalid-feedback\">Le prénom doit contenir au moins 2 caractères.</div>
                        <div class=\"valid-feedback\">Prénom valide !</div>
                        ";
        // line 157
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 157, $this->source); })()), "prenom", [], "any", false, false, false, 157), 'errors');
        yield "
                    </div>
                </div>

                <div style=\"margin-bottom: 15px;\">
                    ";
        // line 162
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 162, $this->source); })()), "age", [], "any", false, false, false, 162), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Âge"]);
        yield "
                    ";
        // line 163
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 163, $this->source); })()), "age", [], "any", false, false, false, 163), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "25", "id" => "age", "min" => "18", "max" => "120"]]);
        yield "
                    <div class=\"invalid-feedback\">L'âge doit être compris entre 18 et 120 ans.</div>
                    <div class=\"valid-feedback\">Âge valide !</div>
                    ";
        // line 166
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 166, $this->source); })()), "age", [], "any", false, false, false, 166), 'errors');
        yield "
                </div>

                <div style=\"margin-bottom: 15px;\">
                    ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 170, $this->source); })()), "email", [], "any", false, false, false, 170), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Email"]);
        yield "
                    ";
        // line 171
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 171, $this->source); })()), "email", [], "any", false, false, false, 171), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "exemple@email.com", "id" => "email"]]);
        yield "
                    <div class=\"invalid-feedback\">Veuillez entrer un email valide.</div>
                    <div class=\"valid-feedback\">Email valide !</div>
                    ";
        // line 174
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 174, $this->source); })()), "email", [], "any", false, false, false, 174), 'errors');
        yield "
                </div>

                <!-- Liste déroulante avec seulement PATIENT (champ caché ou désactivé) -->
                <div style=\"margin-bottom: 15px; display: none;\">
                    ";
        // line 179
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 179, $this->source); })()), "role", [], "any", false, false, false, 179), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Je suis"]);
        yield "
                    ";
        // line 180
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 180, $this->source); })()), "role", [], "any", false, false, false, 180), 'widget', ["attr" => ["class" => "form-select", "id" => "role"]]);
        yield "
                </div>
                
                <!-- Champ caché pour forcer le rôle PATIENT -->
                <input type=\"hidden\" name=\"role\" value=\"ROLE_PATIENT\">

                <div style=\"margin-bottom: 20px;\">
                    ";
        // line 187
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 187, $this->source); })()), "plainPassword", [], "any", false, false, false, 187), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Mot de passe"]);
        yield "
                    ";
        // line 188
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 188, $this->source); })()), "plainPassword", [], "any", false, false, false, 188), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Minimum 6 caractères", "id" => "password", "minlength" => "6"]]);
        yield "
                    <div class=\"invalid-feedback\">Le mot de passe doit contenir au moins 6 caractères.</div>
                    <div class=\"valid-feedback\">Mot de passe valide !</div>
                    ";
        // line 191
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 191, $this->source); })()), "plainPassword", [], "any", false, false, false, 191), 'errors');
        yield "
                </div>

                <button type=\"submit\" class=\"btn-register\">
                    <i class=\"ri-user-add-line me-2\"></i>S'inscrire
                </button>

                <div class=\"text-center mt-3\">
                    <a href=\"";
        // line 199
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-decoration-none\" style=\"color: #667eea;\">Déjà un compte ? Se connecter</a>
                </div>
            ";
        // line 201
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 201, $this->source); })()), 'form_end');
        yield "
        </div>
    </div>
    
    <script>
        // Validation en temps réel
        const nomInput = document.getElementById('nom');
        const prenomInput = document.getElementById('prenom');
        const ageInput = document.getElementById('age');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        function validateField(input, isValid) {
            if (input.value) {
                if (isValid) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
            }
            return isValid && input.value;
        }
        
        function validateNom() {
            return validateField(nomInput, nomInput.value.length >= 2);
        }
        
        function validatePrenom() {
            return validateField(prenomInput, prenomInput.value.length >= 2);
        }
        
        function validateAge() {
            const age = parseInt(ageInput.value);
            return validateField(ageInput, age >= 18 && age <= 120);
        }
        
        function validateEmail() {
            const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
            return validateField(emailInput, emailRegex.test(emailInput.value));
        }
        
        function validatePassword() {
            return validateField(passwordInput, passwordInput.value.length >= 6);
        }
        
        nomInput.addEventListener('input', validateNom);
        prenomInput.addEventListener('input', validatePrenom);
        ageInput.addEventListener('input', validateAge);
        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const isNomValid = validateNom();
            const isPrenomValid = validatePrenom();
            const isAgeValid = validateAge();
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            
            if (!isNomValid || !isPrenomValid || !isAgeValid || !isEmailValid || !isPasswordValid) {
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
        return "auth/regis9dim.html.twig";
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
        return array (  322 => 201,  317 => 199,  306 => 191,  300 => 188,  296 => 187,  286 => 180,  282 => 179,  274 => 174,  268 => 171,  264 => 170,  257 => 166,  251 => 163,  247 => 162,  239 => 157,  233 => 154,  229 => 153,  223 => 150,  217 => 147,  213 => 146,  207 => 143,  204 => 142,  195 => 140,  191 => 139,  173 => 124,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription | PSYDESK</title>
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
        .register-card {
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
        .register-left {
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
        .register-left h2 { font-size: 2rem; font-weight: bold; margin-bottom: 20px; }
        .register-left p { opacity: 0.9; line-height: 1.6; }
        .feature-list { margin-top: 40px; text-align: left; }
        .feature-item { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .feature-item i { font-size: 22px; }
        .feature-item span { font-size: 16px; }
        .register-right { padding: 40px; width: 50%; background: white; }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            width: 100%;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #cd4cad;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
            outline: none;
        }
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #a767a1;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc2626'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc2626' stroke='none'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .form-control.is-valid, .form-select.is-valid {
            border-color: #b54cac;
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2310b981' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e\");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .invalid-feedback { color: #6389fc; font-size: 12px; margin-top: 5px; display: block; }
        .valid-feedback { color: #6389fc; font-size: 12px; margin-top: 5px; display: block; }
        .form-label { font-weight: 600; margin-bottom: 8px; display: block; color: #c26fb6; }
        .btn-register {
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
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(102,126,234,0.4); }
        .text-center { text-align: center; }
        .mt-3 { margin-top: 15px; }
        .mt-4 { margin-top: 20px; }
        .mb-4 { margin-bottom: 20px; }
        .alert { padding: 12px; border-radius: 10px; margin-bottom: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; border: none; }
        .text-decoration-none { text-decoration: none; }
        @media (max-width: 768px) {
            .register-card { flex-direction: column; }
            .register-left, .register-right { width: 100%; }
            .register-left { padding: 30px; }
            .sidebar-logo { max-width: 120px; }
        }
    </style>
</head>
<body>
    <div class=\"register-card\">
        <div class=\"register-left\">
            <div>
                <h2>Inscription</h2>
                <p>Rejoignez notre communauté et profitez de tous nos services.</p>
                <!-- Conteneur du logo stylisé comme sur la page login -->
                <div class=\"sidebar-logo-container\">
                    <img src=\"{{ asset('assets/images/logop.png') }}\" 
                         alt=\"Logo IOVision\" 
                         class=\"sidebar-logo\"
                         onerror=\"this.style.display='none'\">
                </div>
            </div>
            <div class=\"feature-list\">
                <div class=\"feature-item\"><i class=\"ri-checkbox-circle-line\"></i><span>Accès illimité</span></div>
                <div class=\"feature-item\"><i class=\"ri-shield-star-line\"></i><span>Sécurisé</span></div>
                <div class=\"feature-item\"><i class=\"ri-customer-service-line\"></i><span>Support 24/7</span></div>
            </div>
        </div>
        <div class=\"register-right\">
            <h3 class=\"text-center mb-4\" style=\"color: #1e293b;\">Créez votre compte</h3>
            
            {% for message in app.flashes('success') %}
                <div class=\"alert alert-success\">{{ message }}</div>
            {% endfor %}
            
            {{ form_start(registrationForm, {'attr': {'id': 'registerForm', 'novalidate': 'novalidate'}}) }}
                <div style=\"display: flex; gap: 15px; margin-bottom: 15px;\">
                    <div style=\"flex: 1;\">
                        {{ form_label(registrationForm.nom, 'Nom', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(registrationForm.nom, {'attr': {'class': 'form-control', 'placeholder': 'Dupont', 'id': 'nom', 'minlength': '2'}}) }}
                        <div class=\"invalid-feedback\">Le nom doit contenir au moins 2 caractères.</div>
                        <div class=\"valid-feedback\">Nom valide !</div>
                        {{ form_errors(registrationForm.nom) }}
                    </div>
                    <div style=\"flex: 1;\">
                        {{ form_label(registrationForm.prenom, 'Prénom', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(registrationForm.prenom, {'attr': {'class': 'form-control', 'placeholder': 'Jean', 'id': 'prenom', 'minlength': '2'}}) }}
                        <div class=\"invalid-feedback\">Le prénom doit contenir au moins 2 caractères.</div>
                        <div class=\"valid-feedback\">Prénom valide !</div>
                        {{ form_errors(registrationForm.prenom) }}
                    </div>
                </div>

                <div style=\"margin-bottom: 15px;\">
                    {{ form_label(registrationForm.age, 'Âge', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.age, {'attr': {'class': 'form-control', 'placeholder': '25', 'id': 'age', 'min': '18', 'max': '120'}}) }}
                    <div class=\"invalid-feedback\">L'âge doit être compris entre 18 et 120 ans.</div>
                    <div class=\"valid-feedback\">Âge valide !</div>
                    {{ form_errors(registrationForm.age) }}
                </div>

                <div style=\"margin-bottom: 15px;\">
                    {{ form_label(registrationForm.email, 'Email', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control', 'placeholder': 'exemple@email.com', 'id': 'email'}}) }}
                    <div class=\"invalid-feedback\">Veuillez entrer un email valide.</div>
                    <div class=\"valid-feedback\">Email valide !</div>
                    {{ form_errors(registrationForm.email) }}
                </div>

                <!-- Liste déroulante avec seulement PATIENT (champ caché ou désactivé) -->
                <div style=\"margin-bottom: 15px; display: none;\">
                    {{ form_label(registrationForm.role, 'Je suis', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.role, {'attr': {'class': 'form-select', 'id': 'role'}}) }}
                </div>
                
                <!-- Champ caché pour forcer le rôle PATIENT -->
                <input type=\"hidden\" name=\"role\" value=\"ROLE_PATIENT\">

                <div style=\"margin-bottom: 20px;\">
                    {{ form_label(registrationForm.plainPassword, 'Mot de passe', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.plainPassword, {'attr': {'class': 'form-control', 'placeholder': 'Minimum 6 caractères', 'id': 'password', 'minlength': '6'}}) }}
                    <div class=\"invalid-feedback\">Le mot de passe doit contenir au moins 6 caractères.</div>
                    <div class=\"valid-feedback\">Mot de passe valide !</div>
                    {{ form_errors(registrationForm.plainPassword) }}
                </div>

                <button type=\"submit\" class=\"btn-register\">
                    <i class=\"ri-user-add-line me-2\"></i>S'inscrire
                </button>

                <div class=\"text-center mt-3\">
                    <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none\" style=\"color: #667eea;\">Déjà un compte ? Se connecter</a>
                </div>
            {{ form_end(registrationForm) }}
        </div>
    </div>
    
    <script>
        // Validation en temps réel
        const nomInput = document.getElementById('nom');
        const prenomInput = document.getElementById('prenom');
        const ageInput = document.getElementById('age');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        function validateField(input, isValid) {
            if (input.value) {
                if (isValid) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
            }
            return isValid && input.value;
        }
        
        function validateNom() {
            return validateField(nomInput, nomInput.value.length >= 2);
        }
        
        function validatePrenom() {
            return validateField(prenomInput, prenomInput.value.length >= 2);
        }
        
        function validateAge() {
            const age = parseInt(ageInput.value);
            return validateField(ageInput, age >= 18 && age <= 120);
        }
        
        function validateEmail() {
            const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
            return validateField(emailInput, emailRegex.test(emailInput.value));
        }
        
        function validatePassword() {
            return validateField(passwordInput, passwordInput.value.length >= 6);
        }
        
        nomInput.addEventListener('input', validateNom);
        prenomInput.addEventListener('input', validatePrenom);
        ageInput.addEventListener('input', validateAge);
        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const isNomValid = validateNom();
            const isPrenomValid = validatePrenom();
            const isAgeValid = validateAge();
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            
            if (!isNomValid || !isPrenomValid || !isAgeValid || !isEmailValid || !isPasswordValid) {
                e.preventDefault();
                alert('Veuillez corriger les erreurs dans le formulaire.');
            }
        });
    </script>
</body>
</html>", "auth/regis9dim.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\regis9dim.html.twig");
    }
}
