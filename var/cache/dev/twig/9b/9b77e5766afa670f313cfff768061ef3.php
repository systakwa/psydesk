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

/* api/objectif_notes.html.twig */
class __TwigTemplate_6868c5204e951e3891eea958c1592d5e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "api/objectif_notes.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "api/objectif_notes.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Notes de l'objectif</title>
    <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
</head>
<body class=\"bg-light\">
    <main class=\"container py-5\">
        <h1 class=\"mb-4\">Notes pour l'objectif: ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["objectif"]) || array_key_exists("objectif", $context) ? $context["objectif"] : (function () { throw new RuntimeError('Variable "objectif" does not exist.', 11, $this->source); })()), "description", [], "any", false, false, false, 11), "html", null, true);
        yield "</h1>
        ";
        // line 12
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["notejours"]) || array_key_exists("notejours", $context) ? $context["notejours"] : (function () { throw new RuntimeError('Variable "notejours" does not exist.', 12, $this->source); })()))) {
            // line 13
            yield "            <div class=\"alert alert-info\">Aucune note pour cet objectif.</div>
        ";
        } else {
            // line 15
            yield "            <div class=\"list-group\">
                ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notejours"]) || array_key_exists("notejours", $context) ? $context["notejours"] : (function () { throw new RuntimeError('Variable "notejours" does not exist.', 16, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 17
                yield "                    <div class=\"list-group-item mb-2\">
                        <h5>";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["note"], "texteNote", [], "any", false, false, false, 18), 0, 200), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["note"], "texteNote", [], "any", false, false, false, 18)) > 200)) {
                    yield "...";
                }
                yield "</h5>
                        <div class=\"small text-muted\">Date: ";
                // line 19
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "date", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "date", [], "any", false, false, false, 19), "Y-m-d"), "html", null, true)) : (""));
                yield " • Créé: ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "createdAt", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "createdAt", [], "any", false, false, false, 19), "Y-m-d H:i"), "html", null, true)) : (""));
                yield "</div>
                        <p class=\"mt-2\">Évaluation: ";
                // line 20
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "evaluation", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Oui") : ("Non"));
                yield " — Satisfaction: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "satisfer", [], "any", false, false, false, 20), "html", null, true);
                yield "/10</p>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['note'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            yield "            </div>
        ";
        }
        // line 25
        yield "    </main>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "api/objectif_notes.html.twig";
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
        return array (  108 => 25,  104 => 23,  93 => 20,  87 => 19,  80 => 18,  77 => 17,  73 => 16,  70 => 15,  66 => 13,  64 => 12,  60 => 11,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Notes de l'objectif</title>
    <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
</head>
<body class=\"bg-light\">
    <main class=\"container py-5\">
        <h1 class=\"mb-4\">Notes pour l'objectif: {{ objectif.description }}</h1>
        {% if notejours is empty %}
            <div class=\"alert alert-info\">Aucune note pour cet objectif.</div>
        {% else %}
            <div class=\"list-group\">
                {% for note in notejours %}
                    <div class=\"list-group-item mb-2\">
                        <h5>{{ note.texteNote|slice(0,200) }}{% if note.texteNote|length > 200 %}...{% endif %}</h5>
                        <div class=\"small text-muted\">Date: {{ note.date ? note.date|date('Y-m-d') : '' }} • Créé: {{ note.createdAt ? note.createdAt|date('Y-m-d H:i') : '' }}</div>
                        <p class=\"mt-2\">Évaluation: {{ note.evaluation ? 'Oui' : 'Non' }} — Satisfaction: {{ note.satisfer }}/10</p>
                    </div>
                {% endfor %}
            </div>
        {% endif %}
    </main>
</body>
</html>
", "api/objectif_notes.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\api\\objectif_notes.html.twig");
    }
}
