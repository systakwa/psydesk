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

/* objectif/_form_modal.html.twig */
class __TwigTemplate_d08c9aae7f4fe6cf67a423d038923e2d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "objectif/_form_modal.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "objectif/_form_modal.html.twig"));

        // line 2
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["attr" => ["id" => "objectif-form", "data-action" => "submit"]]);
        yield "
    <div class=\"mb-3\">
        ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "description", [], "any", false, false, false, 4), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Description"]);
        yield "
        ";
        // line 5
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "description", [], "any", false, false, false, 5), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Décrivez l'objectif du patient"]]);
        yield "
        ";
        // line 6
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "description", [], "any", false, false, false, 6), 'errors');
        yield "
    </div>
    <div class=\"mb-3\">
        ";
        // line 9
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "datefin", [], "any", false, false, false, 9), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Date de fin"]);
        yield "
        ";
        // line 10
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "datefin", [], "any", false, false, false, 10), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
        ";
        // line 11
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "datefin", [], "any", false, false, false, 11), 'errors');
        yield "
    </div>
    <div class=\"mb-3 form-check\">
        ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "status", [], "any", false, false, false, 14), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
        ";
        // line 15
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "status", [], "any", false, false, false, 15), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "Visible au psychologue"]);
        yield "
        ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "status", [], "any", false, false, false, 16), 'errors');
        yield "
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Ajouter Objectif</button>
";
        // line 19
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), 'form_end');
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "objectif/_form_modal.html.twig";
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
        return array (  95 => 19,  89 => 16,  85 => 15,  81 => 14,  75 => 11,  71 => 10,  67 => 9,  61 => 6,  57 => 5,  53 => 4,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/objectif/_form_modal.html.twig #}
{{ form_start(form, {'attr': {'id': 'objectif-form', 'data-action': 'submit'}}) }}
    <div class=\"mb-3\">
        {{ form_label(form.description, 'Description', {'label_attr': {'class': 'form-label'}}) }}
        {{ form_widget(form.description, {'attr': {'class': 'form-control', 'placeholder': 'Décrivez l\\'objectif du patient'}}) }}
        {{ form_errors(form.description) }}
    </div>
    <div class=\"mb-3\">
        {{ form_label(form.datefin, 'Date de fin', {'label_attr': {'class': 'form-label'}}) }}
        {{ form_widget(form.datefin, {'attr': {'class': 'form-control'}}) }}
        {{ form_errors(form.datefin) }}
    </div>
    <div class=\"mb-3 form-check\">
        {{ form_widget(form.status, {'attr': {'class': 'form-check-input'}}) }}
        {{ form_label(form.status, 'Visible au psychologue', {'label_attr': {'class': 'form-check-label'}}) }}
        {{ form_errors(form.status) }}
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Ajouter Objectif</button>
{{ form_end(form) }}", "objectif/_form_modal.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\objectif\\_form_modal.html.twig");
    }
}
