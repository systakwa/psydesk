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

/* partials/_footer.html.twig */
class __TwigTemplate_cf548ffd4154ec3683622ce0be3051d2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_footer.html.twig"));

        // line 1
        yield "<footer class=\"footer\">
    <div class=\"d-sm-flex justify-content-center justify-content-sm-between\">
        <span class=\"text-muted d-block text-center text-sm-left d-sm-inline-block\">Copyright © PsyDesk.com 2026</span>
        <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\"> from PsyDesk.com</span>
    </div>
</footer>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_footer.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer class=\"footer\">
    <div class=\"d-sm-flex justify-content-center justify-content-sm-between\">
        <span class=\"text-muted d-block text-center text-sm-left d-sm-inline-block\">Copyright © PsyDesk.com 2026</span>
        <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\"> from PsyDesk.com</span>
    </div>
</footer>", "partials/_footer.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\partials\\_footer.html.twig");
    }
}
