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

/* auth/profile.html.twig */
class __TwigTemplate_74ef3c2436626398e32dc8dff522566b extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/profile.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Mon profil | PSYDESK";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
<style>
    * { font-family: 'Inter', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f5f7fb; }
    
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: 1000;
    }
    .sidebar .logo { padding: 25px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar .logo h2 { color: white; font-weight: 700; }
    .sidebar .nav-item { margin: 8px 15px; border-radius: 12px; }
    .sidebar .nav-item a { padding: 12px 20px; display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 12px; }
    .sidebar .nav-item a:hover, .sidebar .nav-item.active a { background: rgba(255,255,255,0.15); color: white; }
    
    .main-content { margin-left: 280px; padding: 25px 30px; }
    
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .page-title h1 { font-size: 28px; font-weight: 700; color: #1e293b; margin-bottom: 5px; }
    .user-info { display: flex; align-items: center; gap: 15px; background: white; padding: 8px 20px; border-radius: 50px; }
    .user-avatar { width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
    
    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(174, 72, 140, 0.1);
    }
    
    .profile-avatar {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        font-weight: bold;
        color: white;
        margin: 0 auto 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #bf61c1;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: #bd12a9;
        outline: none;
        box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
    }
    
    .btn-save {
        background: linear-gradient(135deg, #c03fa4 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102,126,234,0.4);
    }
    
    .btn-cancel {
        background: #ca44ef;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
        text-decoration: none;
        text-align: center;
        display: inline-block;
    }
    
    .alert-success {
        background: #934a9b;
        color: #b527ad;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    .alert-danger {
        background: #fee2e2;
        color: #a53f8c;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 139
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

        // line 140
        yield "<div class=\"sidebar\">
    <div class=\"logo\">
        <h2>";
        // line 142
        if (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 142, $this->source); })()), "role", [], "any", false, false, false, 142))) {
            yield "PSYDESK";
        } else {
            yield "❤️ psydesk health mental";
        }
        yield "</h2>
    </div>
    <div class=\"nav-menu\">
        <div class=\"nav-item\">
            <a href=\"
                ";
        // line 147
        if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 147, $this->source); })()), "role", [], "any", false, false, false, 147))) {
            // line 148
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
            yield "
                ";
        } elseif (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source,         // line 149
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 149, $this->source); })()), "role", [], "any", false, false, false, 149))) {
            // line 150
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_psychologue_dashboard");
            yield "
                ";
        } else {
            // line 152
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_patient_dashboard");
            yield "
                ";
        }
        // line 154
        yield "            \">
                <i class=\"ri-dashboard-line\"></i> Tableau de bord
            </a>
        </div>
        <div class=\"nav-item active\">
            <a href=\"";
        // line 159
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
                <i class=\"ri-user-line\"></i> Mon profil
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"";
        // line 164
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
                <i class=\"ri-logout-box-line\"></i> Déconnexion
            </a>
        </div>
    </div>
</div>

<div class=\"main-content\">
    <div class=\"top-bar\">
        <div class=\"page-title\">
            <h1>Mon profil</h1>
            <p>Modifiez vos informations personnelles</p>
        </div>
        <div class=\"user-info\">
            <span>";
        // line 178
        if (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 178, $this->source); })()), "role", [], "any", false, false, false, 178))) {
            yield "Psychologue";
        } elseif (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 178, $this->source); })()), "role", [], "any", false, false, false, 178))) {
            yield "Administrateur";
        } else {
            yield "Patient";
        }
        yield "</span>
            <div class=\"user-avatar\">";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 179, $this->source); })()), "prenom", [], "any", false, false, false, 179))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 179, $this->source); })()), "nom", [], "any", false, false, false, 179))), "html", null, true);
        yield "</div>
        </div>
    </div>

    <div class=\"profile-card\">
        <div class=\"profile-avatar\">";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 184, $this->source); })()), "prenom", [], "any", false, false, false, 184))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 184, $this->source); })()), "nom", [], "any", false, false, false, 184))), "html", null, true);
        yield "</div>
        <h3 style=\"text-align: center; margin-bottom: 5px;\">";
        // line 185
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 185, $this->source); })()), "fullName", [], "any", false, false, false, 185), "html", null, true);
        yield "</h3>
        <p style=\"text-align: center; color: #64748b; margin-bottom: 25px;\">
            ";
        // line 187
        if (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 187, $this->source); })()), "role", [], "any", false, false, false, 187))) {
            yield "Psychologue
            ";
        } elseif (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source,         // line 188
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 188, $this->source); })()), "role", [], "any", false, false, false, 188))) {
            yield "Administrateur
            ";
        } else {
            // line 189
            yield "Patient";
        }
        // line 190
        yield "        </p>
        
        ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 192, $this->source); })()), "flashes", ["success"], "method", false, false, false, 192));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 193
            yield "            <div class=\"alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        yield "        
        ";
        // line 196
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 196, $this->source); })()), "flashes", ["error"], "method", false, false, false, 196));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 197
            yield "            <div class=\"alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 199
        yield "        
        <form method=\"post\">
            <div class=\"form-group\">
                <label>Nom</label>
                <input type=\"text\" name=\"nom\" value=\"";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 203, $this->source); })()), "nom", [], "any", false, false, false, 203), "html", null, true);
        yield "\" class=\"form-control\" required>
            </div>
            
            <div class=\"form-group\">
                <label>Prénom</label>
                <input type=\"text\" name=\"prenom\" value=\"";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 208, $this->source); })()), "prenom", [], "any", false, false, false, 208), "html", null, true);
        yield "\" class=\"form-control\" required>
            </div>
            
            <div class=\"form-group\">
                <label>Âge</label>
                <input type=\"number\" name=\"age\" value=\"";
        // line 213
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 213, $this->source); })()), "age", [], "any", false, false, false, 213), "html", null, true);
        yield "\" class=\"form-control\" required min=\"1\" max=\"120\">
            </div>
            
            <div class=\"form-group\">
                <label>Email</label>
                <input type=\"email\" name=\"email\" value=\"";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 218, $this->source); })()), "email", [], "any", false, false, false, 218), "html", null, true);
        yield "\" class=\"form-control\" required>
            </div>
            
            <hr style=\"margin: 25px 0;\">
            
            <h4 style=\"margin-bottom: 20px;\"> Changer le mot de passe</h4>
            
            <div class=\"form-group\">
                <label>Mot de passe actuel</label>
                <input type=\"password\" name=\"current_password\" class=\"form-control\" placeholder=\"Entrez votre mot de passe actuel\">
            </div>
            
            <div class=\"form-group\">
                <label>Nouveau mot de passe</label>
                <input type=\"password\" name=\"new_password\" class=\"form-control\" placeholder=\"Minimum 6 caractères\">
            </div>
            
            <div class=\"form-group\">
                <label>Confirmer le nouveau mot de passe</label>
                <input type=\"password\" name=\"confirm_password\" class=\"form-control\" placeholder=\"Confirmez votre nouveau mot de passe\">
            </div>
            
            <button type=\"submit\" class=\"btn-save\">
                 Enregistrer les modifications
            </button>
            
            <a href=\"
                ";
        // line 245
        if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 245, $this->source); })()), "role", [], "any", false, false, false, 245))) {
            // line 246
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
            yield "
                ";
        } elseif (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source,         // line 247
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 247, $this->source); })()), "role", [], "any", false, false, false, 247))) {
            // line 248
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_psychologue_dashboard");
            yield "
                ";
        } else {
            // line 250
            yield "                    ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_patient_dashboard");
            yield "
                ";
        }
        // line 252
        yield "            \" class=\"btn-cancel\">
                 Annuler
            </a>
        </form>
    </div>
</div>
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
        return "auth/profile.html.twig";
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
        return array (  480 => 252,  474 => 250,  468 => 248,  466 => 247,  461 => 246,  459 => 245,  429 => 218,  421 => 213,  413 => 208,  405 => 203,  399 => 199,  390 => 197,  386 => 196,  383 => 195,  374 => 193,  370 => 192,  366 => 190,  363 => 189,  358 => 188,  354 => 187,  349 => 185,  344 => 184,  335 => 179,  325 => 178,  308 => 164,  300 => 159,  293 => 154,  287 => 152,  281 => 150,  279 => 149,  274 => 148,  272 => 147,  260 => 142,  256 => 140,  243 => 139,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon profil | PSYDESK{% endblock %}

{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
<style>
    * { font-family: 'Inter', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f5f7fb; }
    
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: 1000;
    }
    .sidebar .logo { padding: 25px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar .logo h2 { color: white; font-weight: 700; }
    .sidebar .nav-item { margin: 8px 15px; border-radius: 12px; }
    .sidebar .nav-item a { padding: 12px 20px; display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 12px; }
    .sidebar .nav-item a:hover, .sidebar .nav-item.active a { background: rgba(255,255,255,0.15); color: white; }
    
    .main-content { margin-left: 280px; padding: 25px 30px; }
    
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .page-title h1 { font-size: 28px; font-weight: 700; color: #1e293b; margin-bottom: 5px; }
    .user-info { display: flex; align-items: center; gap: 15px; background: white; padding: 8px 20px; border-radius: 50px; }
    .user-avatar { width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
    
    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(174, 72, 140, 0.1);
    }
    
    .profile-avatar {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        font-weight: bold;
        color: white;
        margin: 0 auto 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #bf61c1;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: #bd12a9;
        outline: none;
        box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
    }
    
    .btn-save {
        background: linear-gradient(135deg, #c03fa4 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102,126,234,0.4);
    }
    
    .btn-cancel {
        background: #ca44ef;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
        text-decoration: none;
        text-align: center;
        display: inline-block;
    }
    
    .alert-success {
        background: #934a9b;
        color: #b527ad;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    .alert-danger {
        background: #fee2e2;
        color: #a53f8c;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"sidebar\">
    <div class=\"logo\">
        <h2>{% if 'ROLE_PSYCHOLOGUE' in user.role %}PSYDESK{% else %}❤️ psydesk health mental{% endif %}</h2>
    </div>
    <div class=\"nav-menu\">
        <div class=\"nav-item\">
            <a href=\"
                {% if 'ROLE_ADMIN' in user.role %}
                    {{ path('app_admin_dashboard') }}
                {% elseif 'ROLE_PSYCHOLOGUE' in user.role %}
                    {{ path('app_psychologue_dashboard') }}
                {% else %}
                    {{ path('app_patient_dashboard') }}
                {% endif %}
            \">
                <i class=\"ri-dashboard-line\"></i> Tableau de bord
            </a>
        </div>
        <div class=\"nav-item active\">
            <a href=\"{{ path('app_profile') }}\">
                <i class=\"ri-user-line\"></i> Mon profil
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"{{ path('app_logout') }}\">
                <i class=\"ri-logout-box-line\"></i> Déconnexion
            </a>
        </div>
    </div>
</div>

<div class=\"main-content\">
    <div class=\"top-bar\">
        <div class=\"page-title\">
            <h1>Mon profil</h1>
            <p>Modifiez vos informations personnelles</p>
        </div>
        <div class=\"user-info\">
            <span>{% if 'ROLE_PSYCHOLOGUE' in user.role %}Psychologue{% elseif 'ROLE_ADMIN' in user.role %}Administrateur{% else %}Patient{% endif %}</span>
            <div class=\"user-avatar\">{{ user.prenom|first|upper }}{{ user.nom|first|upper }}</div>
        </div>
    </div>

    <div class=\"profile-card\">
        <div class=\"profile-avatar\">{{ user.prenom|first|upper }}{{ user.nom|first|upper }}</div>
        <h3 style=\"text-align: center; margin-bottom: 5px;\">{{ user.fullName }}</h3>
        <p style=\"text-align: center; color: #64748b; margin-bottom: 25px;\">
            {% if 'ROLE_PSYCHOLOGUE' in user.role %}Psychologue
            {% elseif 'ROLE_ADMIN' in user.role %}Administrateur
            {% else %}Patient{% endif %}
        </p>
        
        {% for message in app.flashes('success') %}
            <div class=\"alert-success\">{{ message }}</div>
        {% endfor %}
        
        {% for message in app.flashes('error') %}
            <div class=\"alert-danger\">{{ message }}</div>
        {% endfor %}
        
        <form method=\"post\">
            <div class=\"form-group\">
                <label>Nom</label>
                <input type=\"text\" name=\"nom\" value=\"{{ user.nom }}\" class=\"form-control\" required>
            </div>
            
            <div class=\"form-group\">
                <label>Prénom</label>
                <input type=\"text\" name=\"prenom\" value=\"{{ user.prenom }}\" class=\"form-control\" required>
            </div>
            
            <div class=\"form-group\">
                <label>Âge</label>
                <input type=\"number\" name=\"age\" value=\"{{ user.age }}\" class=\"form-control\" required min=\"1\" max=\"120\">
            </div>
            
            <div class=\"form-group\">
                <label>Email</label>
                <input type=\"email\" name=\"email\" value=\"{{ user.email }}\" class=\"form-control\" required>
            </div>
            
            <hr style=\"margin: 25px 0;\">
            
            <h4 style=\"margin-bottom: 20px;\"> Changer le mot de passe</h4>
            
            <div class=\"form-group\">
                <label>Mot de passe actuel</label>
                <input type=\"password\" name=\"current_password\" class=\"form-control\" placeholder=\"Entrez votre mot de passe actuel\">
            </div>
            
            <div class=\"form-group\">
                <label>Nouveau mot de passe</label>
                <input type=\"password\" name=\"new_password\" class=\"form-control\" placeholder=\"Minimum 6 caractères\">
            </div>
            
            <div class=\"form-group\">
                <label>Confirmer le nouveau mot de passe</label>
                <input type=\"password\" name=\"confirm_password\" class=\"form-control\" placeholder=\"Confirmez votre nouveau mot de passe\">
            </div>
            
            <button type=\"submit\" class=\"btn-save\">
                 Enregistrer les modifications
            </button>
            
            <a href=\"
                {% if 'ROLE_ADMIN' in user.role %}
                    {{ path('app_admin_dashboard') }}
                {% elseif 'ROLE_PSYCHOLOGUE' in user.role %}
                    {{ path('app_psychologue_dashboard') }}
                {% else %}
                    {{ path('app_patient_dashboard') }}
                {% endif %}
            \" class=\"btn-cancel\">
                 Annuler
            </a>
        </form>
    </div>
</div>
{% endblock %}", "auth/profile.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\auth\\profile.html.twig");
    }
}
