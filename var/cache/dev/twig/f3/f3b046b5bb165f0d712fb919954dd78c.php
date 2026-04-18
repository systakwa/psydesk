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

/* notejour/show.html.twig */
class __TwigTemplate_efa2c9bf40a9c7a8bc7d20297b157faa extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/show.html.twig"));

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

        yield "Notejour";
        
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
        yield "    <h1>Notejour</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>TexteNote</th>
                <td>";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 16, $this->source); })()), "texteNote", [], "any", false, false, false, 16), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>";
        // line 20
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 20, $this->source); })()), "date", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 20, $this->source); })()), "date", [], "any", false, false, false, 20), "Y-m-d"), "html", null, true)) : (""));
        yield "</td>
            </tr>
            <tr>
                <th>Evaluation</th>
                <td>";
        // line 24
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 24, $this->source); })()), "evaluation", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>Satisfer</th>
                <td>";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 28, $this->source); })()), "satisfer", [], "any", false, false, false, 28), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Created_at</th>
                <td>";
        // line 32
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 32, $this->source); })()), "createdAt", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 32, $this->source); })()), "createdAt", [], "any", false, false, false, 32), "Y-m-d H:i:s"), "html", null, true)) : (""));
        yield "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notejour_index");
        yield "\">back to list</a>

    <a href=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notejour_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["notejour"]) || array_key_exists("notejour", $context) ? $context["notejour"] : (function () { throw new RuntimeError('Variable "notejour" does not exist.', 39, $this->source); })()), "id", [], "any", false, false, false, 39)]), "html", null, true);
        yield "\">edit</a>

    ";
        // line 41
        yield Twig\Extension\CoreExtension::include($this->env, $context, "notejour/_delete_form.html.twig");
        yield "
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
        return "notejour/show.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  167 => 41,  162 => 39,  157 => 37,  149 => 32,  142 => 28,  135 => 24,  128 => 20,  121 => 16,  114 => 12,  106 => 6,  93 => 5,  70 => 3,  59 => 5,  56 => 4,  54 => 3,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("

{% block title %}Notejour{% endblock %}

{% block body %}
    <h1>Notejour</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ notejour.id }}</td>
            </tr>
            <tr>
                <th>TexteNote</th>
                <td>{{ notejour.texteNote }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ notejour.date ? notejour.date|date('Y-m-d') : '' }}</td>
            </tr>
            <tr>
                <th>Evaluation</th>
                <td>{{ notejour.evaluation ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Satisfer</th>
                <td>{{ notejour.satisfer }}</td>
            </tr>
            <tr>
                <th>Created_at</th>
                <td>{{ notejour.createdAt ? notejour.createdAt|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_notejour_index') }}\">back to list</a>

    <a href=\"{{ path('app_notejour_edit', {'id': notejour.id}) }}\">edit</a>

    {{ include('notejour/_delete_form.html.twig') }}
{% endblock %}
", "notejour/show.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\notejour\\show.html.twig");
    }
}
