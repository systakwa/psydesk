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

/* admin/edit_user.html.twig */
class __TwigTemplate_5d80b9faa95c87003413b1a7758e96d6 extends Template
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
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/edit_user.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/edit_user.html.twig"));

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

        yield "Modifier un utilisateur | Administration";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div style=\"display: flex; min-height: 100vh;\">
    <div style=\"width: 260px; background: linear-gradient(135deg, #b95ec3 0%, #b95ec3 100%); color: white; padding: 20px;\">
        <h3 style=\"text-align: center; margin-bottom: 30px;\">⚡ psydesk </h3>
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\" style=\"display: block; padding: 10px; color: white; text-decoration: none; margin-bottom: 10px;\">📊 Tableau de bord</a>
        <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" style=\"display: block; padding: 10px; color: white; text-decoration: none;\">🚪 Déconnexion</a>
    </div>

    <div style=\"flex: 1; padding: 30px; background: #f5f7fb; display: flex; align-items: center; justify-content: center;\">
        <div style=\"background: white; border-radius: 20px; padding: 35px; max-width: 550px; width: 100%; box-shadow: 0 10px 25px rgba(0,0,0,0.1);\">
            <div style=\"text-align: center; margin-bottom: 25px;\">
                <div style=\"width: 80px; height: 80px; background: linear-gradient(135deg, #d06dd3 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;\">
                    <span style=\"font-size: 35px; color: white;\">✏️</span>
                </div>
                <h2 style=\"margin: 0; color: #b457b4;\">Modifier l'utilisateur</h2>
                <p style=\"color: #cd93de; margin-top: 5px;\">ID #";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20), "html", null, true);
        yield "</p>
            </div>
            
            ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "flashes", ["success"], "method", false, false, false, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 24
            yield "                <div style=\"background: #e26fe2; color: #bb61bb; padding: 12px; border-radius: 10px; margin-bottom: 20px;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "            
            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "flashes", ["error"], "method", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 28
            yield "                <div style=\"background: #fee2e2; color: #d652c7; padding: 12px; border-radius: 10px; margin-bottom: 20px;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "            
            <form method=\"post\">
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #e757e7;\">Nom complet</label>
                    <div style=\"display: flex; gap: 15px;\">
                        <input type=\"text\" name=\"nom\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 35, $this->source); })()), "nom", [], "any", false, false, false, 35), "html", null, true);
        yield "\" 
                               style=\"flex: 1; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\"
                               required placeholder=\"Nom\">
                        <input type=\"text\" name=\"prenom\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 38, $this->source); })()), "prenom", [], "any", false, false, false, 38), "html", null, true);
        yield "\" 
                               style=\"flex: 1; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\"
                               required placeholder=\"Prénom\">
                    </div>
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #507fca;\">Âge</label>
                    <input type=\"number\" name=\"age\" value=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 46, $this->source); })()), "age", [], "any", false, false, false, 46), "html", null, true);
        yield "\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\" 
                           required min=\"1\" max=\"120\">
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #7fa4df;\">Email</label>
                    <input type=\"email\" name=\"email\" value=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 53, $this->source); })()), "email", [], "any", false, false, false, 53), "html", null, true);
        yield "\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\" 
                           required>
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #6091df;\">Rôle</label>
                    <select name=\"role\" style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\">
                        <option value=\"ROLE_PATIENT\" ";
        // line 61
        if (CoreExtension::inFilter("ROLE_PATIENT", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 61, $this->source); })()), "rols", [], "any", false, false, false, 61))) {
            yield "selected";
        }
        yield "> Patient</option>
                        <option value=\"ROLE_PSYCHOLOGUE\" ";
        // line 62
        if (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 62, $this->source); })()), "role", [], "any", false, false, false, 62))) {
            yield "selected";
        }
        yield "> Psychologue</option>
                        <option value=\"ROLE_ADMIN\" ";
        // line 63
        if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 63, $this->source); })()), "role", [], "any", false, false, false, 63))) {
            yield "selected";
        }
        yield "> Administrateur</option>
                    </select>
                </div>
                
                <div style=\"margin-bottom: 25px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #1862d9;\">Nouveau mot de passe</label>
                    <input type=\"password\" name=\"password\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #3375cc; border-radius: 10px; font-size: 14px;\" 
                           placeholder=\"Laisser vide pour ne pas changer\">
                    <small style=\"color: #b991bd;\">Minimum 6 caractères</small>
                </div>
                
                <div style=\"display: flex; gap: 15px; margin-top: 10px;\">
                    <button type=\"submit\" 
                            style=\"flex: 1; background: linear-gradient(135deg, #b694c4 0%, #764ba2 100%); color: white; border: none; padding: 14px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; transition: transform 0.2s;\">
                         Enregistrer
                    </button>
                    <a href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\" 
                       style=\"flex: 1; background: #a158b6; color: white; text-align: center; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 600;\">
                         Annuler
                    </a>
                </div>
            </form>
        </div>
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
        return "admin/edit_user.html.twig";
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
        return array (  236 => 80,  214 => 63,  208 => 62,  202 => 61,  191 => 53,  181 => 46,  170 => 38,  164 => 35,  157 => 30,  148 => 28,  144 => 27,  141 => 26,  132 => 24,  128 => 23,  122 => 20,  109 => 10,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Modifier un utilisateur | Administration{% endblock %}

{% block body %}
<div style=\"display: flex; min-height: 100vh;\">
    <div style=\"width: 260px; background: linear-gradient(135deg, #b95ec3 0%, #b95ec3 100%); color: white; padding: 20px;\">
        <h3 style=\"text-align: center; margin-bottom: 30px;\">⚡ psydesk </h3>
        <a href=\"{{ path('app_admin_dashboard') }}\" style=\"display: block; padding: 10px; color: white; text-decoration: none; margin-bottom: 10px;\">📊 Tableau de bord</a>
        <a href=\"{{ path('app_logout') }}\" style=\"display: block; padding: 10px; color: white; text-decoration: none;\">🚪 Déconnexion</a>
    </div>

    <div style=\"flex: 1; padding: 30px; background: #f5f7fb; display: flex; align-items: center; justify-content: center;\">
        <div style=\"background: white; border-radius: 20px; padding: 35px; max-width: 550px; width: 100%; box-shadow: 0 10px 25px rgba(0,0,0,0.1);\">
            <div style=\"text-align: center; margin-bottom: 25px;\">
                <div style=\"width: 80px; height: 80px; background: linear-gradient(135deg, #d06dd3 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;\">
                    <span style=\"font-size: 35px; color: white;\">✏️</span>
                </div>
                <h2 style=\"margin: 0; color: #b457b4;\">Modifier l'utilisateur</h2>
                <p style=\"color: #cd93de; margin-top: 5px;\">ID #{{ user.id }}</p>
            </div>
            
            {% for message in app.flashes('success') %}
                <div style=\"background: #e26fe2; color: #bb61bb; padding: 12px; border-radius: 10px; margin-bottom: 20px;\">{{ message }}</div>
            {% endfor %}
            
            {% for message in app.flashes('error') %}
                <div style=\"background: #fee2e2; color: #d652c7; padding: 12px; border-radius: 10px; margin-bottom: 20px;\">{{ message }}</div>
            {% endfor %}
            
            <form method=\"post\">
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #e757e7;\">Nom complet</label>
                    <div style=\"display: flex; gap: 15px;\">
                        <input type=\"text\" name=\"nom\" value=\"{{ user.nom }}\" 
                               style=\"flex: 1; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\"
                               required placeholder=\"Nom\">
                        <input type=\"text\" name=\"prenom\" value=\"{{ user.prenom }}\" 
                               style=\"flex: 1; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\"
                               required placeholder=\"Prénom\">
                    </div>
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #507fca;\">Âge</label>
                    <input type=\"number\" name=\"age\" value=\"{{ user.age }}\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\" 
                           required min=\"1\" max=\"120\">
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #7fa4df;\">Email</label>
                    <input type=\"email\" name=\"email\" value=\"{{ user.email }}\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\" 
                           required>
                </div>
                
                <div style=\"margin-bottom: 18px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #6091df;\">Rôle</label>
                    <select name=\"role\" style=\"width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 14px;\">
                        <option value=\"ROLE_PATIENT\" {% if 'ROLE_PATIENT' in user.rols %}selected{% endif %}> Patient</option>
                        <option value=\"ROLE_PSYCHOLOGUE\" {% if 'ROLE_PSYCHOLOGUE' in user.role %}selected{% endif %}> Psychologue</option>
                        <option value=\"ROLE_ADMIN\" {% if 'ROLE_ADMIN' in user.role %}selected{% endif %}> Administrateur</option>
                    </select>
                </div>
                
                <div style=\"margin-bottom: 25px;\">
                    <label style=\"display: block; margin-bottom: 6px; font-weight: 600; color: #1862d9;\">Nouveau mot de passe</label>
                    <input type=\"password\" name=\"password\" 
                           style=\"width: 100%; padding: 12px; border: 2px solid #3375cc; border-radius: 10px; font-size: 14px;\" 
                           placeholder=\"Laisser vide pour ne pas changer\">
                    <small style=\"color: #b991bd;\">Minimum 6 caractères</small>
                </div>
                
                <div style=\"display: flex; gap: 15px; margin-top: 10px;\">
                    <button type=\"submit\" 
                            style=\"flex: 1; background: linear-gradient(135deg, #b694c4 0%, #764ba2 100%); color: white; border: none; padding: 14px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; transition: transform 0.2s;\">
                         Enregistrer
                    </button>
                    <a href=\"{{ path('app_admin_dashboard') }}\" 
                       style=\"flex: 1; background: #a158b6; color: white; text-align: center; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 600;\">
                         Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}", "admin/edit_user.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\admin\\edit_user.html.twig");
    }
}
