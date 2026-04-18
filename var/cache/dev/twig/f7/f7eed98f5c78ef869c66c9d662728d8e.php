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

/* reponse/index.html.twig */
class __TwigTemplate_2d509f56d6a550689bff7b1395f99c4f extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reponse/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reponse/index.html.twig"));

        // line 1
        yield "

";
        // line 3
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 4
        yield "
";
        // line 5
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
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

        yield "Reponse index";
        
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
        yield "    <h1>Reponse index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reponses"]) || array_key_exists("reponses", $context) ? $context["reponses"] : (function () { throw new RuntimeError('Variable "reponses" does not exist.', 18, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["reponse"]) {
            // line 19
            yield "            <tr>
                <td>";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "id", [], "any", false, false, false, 20), "html", null, true);
            yield "</td>
                <td>";
            // line 21
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "date", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "date", [], "any", false, false, false, 21), "Y-m-d"), "html", null, true)) : (""));
            yield "</td>
                <td>";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "description", [], "any", false, false, false, 22), "html", null, true);
            yield "</td>
                <td>
                    <a href=\"";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "id", [], "any", false, false, false, 24)]), "html", null, true);
            yield "\">show</a>
                    <a href=\"";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "id", [], "any", false, false, false, 25)]), "html", null, true);
            yield "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        // line 28
        if (!$context['_iterated']) {
            // line 29
            yield "            <tr>
                <td colspan=\"4\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['reponse'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "        </tbody>
    </table>

    <a href=\"";
        // line 36
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_new");
        yield "\">Create new</a>
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
        return "reponse/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  169 => 36,  164 => 33,  155 => 29,  153 => 28,  145 => 25,  141 => 24,  136 => 22,  132 => 21,  128 => 20,  125 => 19,  120 => 18,  106 => 6,  93 => 5,  70 => 3,  59 => 5,  56 => 4,  54 => 3,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("

{% block title %}Reponse index{% endblock %}

{% block body %}
    <h1>Reponse index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for reponse in reponses %}
            <tr>
                <td>{{ reponse.id }}</td>
                <td>{{ reponse.date ? reponse.date|date('Y-m-d') : '' }}</td>
                <td>{{ reponse.description }}</td>
                <td>
                    <a href=\"{{ path('app_reponse_show', {'id': reponse.id}) }}\">show</a>
                    <a href=\"{{ path('app_reponse_edit', {'id': reponse.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"4\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('app_reponse_new') }}\">Create new</a>
{% endblock %}
", "reponse/index.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\reponse\\index.html.twig");
    }
}
