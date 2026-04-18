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

/* notejour/_form_modal.html.twig */
class __TwigTemplate_290af97a4076adf2f83baa50089d69f0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/_form_modal.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/_form_modal.html.twig"));

        // line 2
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["attr" => ["id" => "notejour-form", "class" => "needs-validation"]]);
        yield "
    <input type=\"hidden\" name=\"objectif_id\" value=\"";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["objectif_id"]) || array_key_exists("objectif_id", $context) ? $context["objectif_id"] : (function () { throw new RuntimeError('Variable "objectif_id" does not exist.', 3, $this->source); })()), "html", null, true);
        yield "\">  ";
        // line 4
        yield "
    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Date</label>
        ";
        // line 7
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "date", [], "any", false, false, false, 7), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
        ";
        // line 8
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "date", [], "any", false, false, false, 8), 'errors');
        yield "
    </div>
    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Contenu de la note</label>
        ";
        // line 12
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "texteNote", [], "any", false, false, false, 12), 'widget', ["attr" => ["class" => "form-control", "rows" => 5, "placeholder" => "Décrivez votre note..."]]);
        yield "
        ";
        // line 13
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "texteNote", [], "any", false, false, false, 13), 'errors');
        yield "
        <small class=\"form-text text-muted\">Minimum 5 caractères.</small>
    </div>
    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Niveau de satisfaction</label>
        <div class=\"d-flex justify-content-between\">
            <span class=\"text-muted small\">0 - Très insatisfait</span>
            <span class=\"text-muted small\">5 - Neutre</span>
            <span class=\"text-muted small\">10 - Très satisfait</span>
        </div>
        ";
        // line 23
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "satisfer", [], "any", false, false, false, 23), 'widget', ["attr" => ["class" => "form-range", "min" => 0, "max" => 10, "step" => 1]]);
        yield "
        ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "satisfer", [], "any", false, false, false, 24), 'errors');
        yield "
        <div class=\"mt-2 text-center\" id=\"satisfaction-value\">0</div>
    </div>
    <div class=\"mb-3 form-check\">
        ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "evaluation", [], "any", false, false, false, 28), 'widget', ["attr" => ["class" => "form-check-input"]]);
        yield "
        ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "evaluation", [], "any", false, false, false, 29), 'label', ["label_attr" => ["class" => "form-check-label"], "label" => "Objectif achevé !"]);
        yield "
        ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "evaluation", [], "any", false, false, false, 30), 'errors');
        yield "
    </div>
    <div class=\"d-flex justify-content-end gap-2 mt-3\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"submit\" class=\"btn btn-primary\">Ajouter la note</button>
    </div>
";
        // line 36
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), 'form_end');
        yield "

<script>
    const slider = document.getElementById('";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "satisfer", [], "any", false, false, false, 39), "vars", [], "any", false, false, false, 39), "id", [], "any", false, false, false, 39), "html", null, true);
        yield "');
    if (slider) {
        const output = document.getElementById('satisfaction-value');
        output.textContent = slider.value;
        slider.addEventListener('input', function() {
            output.textContent = this.value;
        });
    }
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "notejour/_form_modal.html.twig";
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
        return array (  122 => 39,  116 => 36,  107 => 30,  103 => 29,  99 => 28,  92 => 24,  88 => 23,  75 => 13,  71 => 12,  64 => 8,  60 => 7,  55 => 4,  52 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/notejour/_form_modal.html.twig #}
{{ form_start(form, {'attr': {'id': 'notejour-form', 'class': 'needs-validation'}}) }}
    <input type=\"hidden\" name=\"objectif_id\" value=\"{{ objectif_id }}\">  {# ← champ caché #}

    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Date</label>
        {{ form_widget(form.date, {'attr': {'class': 'form-control'}}) }}
        {{ form_errors(form.date) }}
    </div>
    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Contenu de la note</label>
        {{ form_widget(form.texteNote, {'attr': {'class': 'form-control', 'rows': 5, 'placeholder': 'Décrivez votre note...'}}) }}
        {{ form_errors(form.texteNote) }}
        <small class=\"form-text text-muted\">Minimum 5 caractères.</small>
    </div>
    <div class=\"mb-3\">
        <label class=\"form-label fw-bold\">Niveau de satisfaction</label>
        <div class=\"d-flex justify-content-between\">
            <span class=\"text-muted small\">0 - Très insatisfait</span>
            <span class=\"text-muted small\">5 - Neutre</span>
            <span class=\"text-muted small\">10 - Très satisfait</span>
        </div>
        {{ form_widget(form.satisfer, {'attr': {'class': 'form-range', 'min': 0, 'max': 10, 'step': 1}}) }}
        {{ form_errors(form.satisfer) }}
        <div class=\"mt-2 text-center\" id=\"satisfaction-value\">0</div>
    </div>
    <div class=\"mb-3 form-check\">
        {{ form_widget(form.evaluation, {'attr': {'class': 'form-check-input'}}) }}
        {{ form_label(form.evaluation, 'Objectif achevé !', {'label_attr': {'class': 'form-check-label'}}) }}
        {{ form_errors(form.evaluation) }}
    </div>
    <div class=\"d-flex justify-content-end gap-2 mt-3\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"submit\" class=\"btn btn-primary\">Ajouter la note</button>
    </div>
{{ form_end(form) }}

<script>
    const slider = document.getElementById('{{ form.satisfer.vars.id }}');
    if (slider) {
        const output = document.getElementById('satisfaction-value');
        output.textContent = slider.value;
        slider.addEventListener('input', function() {
            output.textContent = this.value;
        });
    }
</script>", "notejour/_form_modal.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\notejour\\_form_modal.html.twig");
    }
}
