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

/* admin/users.html.twig */
class __TwigTemplate_8e91a5768c5ee7625416ab3cb53a7508 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users.html.twig"));

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

        yield "Gestion des utilisateurs | Administration";
        
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
        yield "<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h4 class=\"mb-0\">👥 Gestion des utilisateurs</h4>
                </div>
                <div class=\"card-body\">
                    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", ["success"], "method", false, false, false, 14));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 15
            yield "                        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "flashes", ["error"], "method", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 18
            yield "                        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        yield "                    
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-hover\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Âge</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 35
            yield "                                    <tr>
                                        <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                                        <td>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nom", [], "any", false, false, false, 37), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "prenom", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                                        <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                                        <td>";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "age", [], "any", false, false, false, 39), "html", null, true);
            yield "</td>
                                        <td>
                                            ";
            // line 41
            if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, $context["u"], "role", [], "any", false, false, false, 41))) {
                // line 42
                yield "                                                <span class=\"badge bg-danger\">Administrateur</span>
                                            ";
            } elseif (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source,             // line 43
$context["u"], "role", [], "any", false, false, false, 43))) {
                // line 44
                yield "                                                <span class=\"badge bg-info\">Psychologue</span>
                                            ";
            } else {
                // line 46
                yield "                                                <span class=\"badge bg-success\">Patient</span>
                                            ";
            }
            // line 48
            yield "                                        </td>
                                        <td>
                                            <a href=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 50)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">
                                                <i class=\"ri-edit-line\"></i> Modifier
                                            </a>
                                            <form method=\"post\" action=\"";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 53)]), "html", null, true);
            yield "\" style=\"display: inline-block;\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete_user_" . CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 54))), "html", null, true);
            yield "\">
                                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer cet utilisateur ?')\">
                                                    <i class=\"ri-delete-bin-line\"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        yield "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        return "admin/users.html.twig";
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
        return array (  222 => 62,  208 => 54,  204 => 53,  198 => 50,  194 => 48,  190 => 46,  186 => 44,  184 => 43,  181 => 42,  179 => 41,  174 => 39,  170 => 38,  164 => 37,  160 => 36,  157 => 35,  153 => 34,  137 => 20,  128 => 18,  123 => 17,  114 => 15,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Gestion des utilisateurs | Administration{% endblock %}

{% block body %}
<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h4 class=\"mb-0\">👥 Gestion des utilisateurs</h4>
                </div>
                <div class=\"card-body\">
                    {% for message in app.flashes('success') %}
                        <div class=\"alert alert-success\">{{ message }}</div>
                    {% endfor %}
                    {% for message in app.flashes('error') %}
                        <div class=\"alert alert-danger\">{{ message }}</div>
                    {% endfor %}
                    
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-hover\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Âge</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for u in users %}
                                    <tr>
                                        <td>{{ u.id }}</td>
                                        <td>{{ u.nom }} {{ u.prenom }}</td>
                                        <td>{{ u.email }}</td>
                                        <td>{{ u.age }}</td>
                                        <td>
                                            {% if 'ROLE_ADMIN' in u.role %}
                                                <span class=\"badge bg-danger\">Administrateur</span>
                                            {% elseif 'ROLE_PSYCHOLOGUE' in u.role %}
                                                <span class=\"badge bg-info\">Psychologue</span>
                                            {% else %}
                                                <span class=\"badge bg-success\">Patient</span>
                                            {% endif %}
                                        </td>
                                        <td>
                                            <a href=\"{{ path('app_admin_user_edit', {'id': u.id}) }}\" class=\"btn btn-sm btn-warning\">
                                                <i class=\"ri-edit-line\"></i> Modifier
                                            </a>
                                            <form method=\"post\" action=\"{{ path('app_admin_user_delete', {'id': u.id}) }}\" style=\"display: inline-block;\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete_user_' ~ u.id) }}\">
                                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Supprimer cet utilisateur ?')\">
                                                    <i class=\"ri-delete-bin-line\"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "admin/users.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\admin\\users.html.twig");
    }
}
