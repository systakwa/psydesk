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

/* dashboard/patient.html.twig */
class __TwigTemplate_7348410f38efa82c501c0777270a718b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/patient.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/patient.html.twig"));

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

        yield "Espace Patient | Velonic";
        
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
    
    .welcome-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; padding: 30px; color: white; margin-bottom: 30px; }
    
    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; margin-bottom: 30px; }
    .stat-card { background: white; border-radius: 20px; padding: 20px; text-align: center; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-value { font-size: 32px; font-weight: 700; color: #667eea; }
    .stat-label { color: #64748b; font-size: 14px; }
    
    .two-columns { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px; }
    .card-premium { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .card-header { padding: 20px 25px; border-bottom: 1px solid #e2e8f0; }
    .card-header h3 { font-size: 18px; font-weight: 600; margin: 0; }
    .list-group { padding: 0; }
    .list-item { display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #e2e8f0; }
    
    .profile-avatar { width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: bold; color: white; margin: 0 auto 15px; }
    .info-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #e2e8f0; }
    .btn-action { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 10px; border-radius: 12px; color: white; width: 100%; text-align: center; display: inline-block; text-decoration: none; margin-top: 15px; }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
        .stats-grid { grid-template-columns: 1fr; }
        .two-columns { grid-template-columns: 1fr; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 61
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

        // line 62
        yield "<div class=\"sidebar\">
    <div class=\"logo\"><h2>❤️ PSYDESK</h2></div>
    <div class=\"nav-menu\">
        <div class=\"nav-item active\"><a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_patient_dashboard");
        yield "\"><i class=\"ri-dashboard-line\"></i> Tableau de bord</a></div>
        <div class=\"nav-item\"><a href=\"#\"><i class=\"ri-calendar-line\"></i> Mes rendez-vous</a></div>
        <div class=\"nav-item\"><a href=\"#\"><i class=\"ri-message-line\"></i> Messages</a></div>
        <div class=\"nav-item\"><a href=\"";
        // line 68
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\"><i class=\"ri-user-line\"></i> Mon profil</a></div>
        <div class=\"nav-item\"><a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\"><i class=\"ri-logout-box-line\"></i> Déconnexion</a></div>
    </div>
</div>

<div class=\"main-content\">
    <div class=\"top-bar\">
        <div class=\"page-title\"><h1>Mon espace santé</h1><p>Bienvenue, ";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 75, $this->source); })()), "prenom", [], "any", false, false, false, 75), "html", null, true);
        yield " 👋</p></div>
        <div class=\"user-info\"><span>Patient</span><div class=\"user-avatar\">";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 76, $this->source); })()), "prenom", [], "any", false, false, false, 76))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 76, $this->source); })()), "nom", [], "any", false, false, false, 76))), "html", null, true);
        yield "</div></div>
    </div>

    <div class=\"welcome-card\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-8\"><h2 class=\"fw-bold mb-2\">👋 Bonjour, ";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 81, $this->source); })()), "prenom", [], "any", false, false, false, 81), "html", null, true);
        yield " !</h2><p class=\"mb-0\">Bienvenue dans votre espace santé. Prenez soin de vous.</p></div>
            <div class=\"col-md-4 text-end\"><i class=\"ri-heart-pulse-line fs-1 opacity-50\"></i></div>
        </div>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card\"><div class=\"stat-value\">0</div><div class=\"stat-label\">Prochains RDV</div></div>
        <div class=\"stat-card\"><div class=\"stat-value\">";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 88, $this->source); })()), "age", [], "any", false, false, false, 88), "html", null, true);
        yield "</div><div class=\"stat-label\">Âge</div></div>
        <div class=\"stat-card\"><div class=\"stat-value\">0</div><div class=\"stat-label\">Consultations</div></div>
    </div>

    <div class=\"two-columns\">
        <div class=\"card-premium\">
            <div class=\"card-header\"><h3>👤 Mon profil</h3></div>
            <div style=\"padding: 25px; text-align: center;\">
                <div class=\"profile-avatar\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 96, $this->source); })()), "prenom", [], "any", false, false, false, 96))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 96, $this->source); })()), "nom", [], "any", false, false, false, 96))), "html", null, true);
        yield "</div>
                <h4>";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 97, $this->source); })()), "fullName", [], "any", false, false, false, 97), "html", null, true);
        yield "</h4>
                <p class=\"text-muted\">Patient</p>
                <hr>
                <div class=\"info-row\"><strong>Email</strong><span>";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 100, $this->source); })()), "email", [], "any", false, false, false, 100), "html", null, true);
        yield "</span></div>
                <div class=\"info-row\"><strong>Âge</strong><span>";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 101, $this->source); })()), "age", [], "any", false, false, false, 101), "html", null, true);
        yield " ans</span></div>
                <a href=\"";
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"btn-action\">Modifier mon profil</a>
            </div>
        </div>
        <div class=\"card-premium\">
            <div class=\"card-header\"><h3>📅 Prochains rendez-vous</h3></div>
            <div class=\"list-group\">
                <div class=\"list-item text-center\" style=\"justify-content: center;\"><span class=\"text-muted\">Aucun rendez-vous programmé</span></div>
            </div>
            <div style=\"padding: 20px; text-align: center;\"><button class=\"btn-action\" style=\"width: auto; padding: 10px 25px;\">Prendre rendez-vous</button></div>
        </div>
    </div>

    <div class=\"card-premium\">
        <div class=\"card-header\"><h3><i class=\"ri-information-line\"></i> Conseils santé</h3></div>
        <div class=\"list-group\">
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Buvez au moins 2 litres d'eau par jour</span></div>
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Faites 30 minutes d'exercice quotidiennement</span></div>
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Dormez 7 à 8 heures par nuit</span></div>
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
        return "dashboard/patient.html.twig";
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
        return array (  255 => 102,  251 => 101,  247 => 100,  241 => 97,  236 => 96,  225 => 88,  215 => 81,  206 => 76,  202 => 75,  193 => 69,  189 => 68,  183 => 65,  178 => 62,  165 => 61,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Espace Patient | Velonic{% endblock %}

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
    
    .welcome-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; padding: 30px; color: white; margin-bottom: 30px; }
    
    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; margin-bottom: 30px; }
    .stat-card { background: white; border-radius: 20px; padding: 20px; text-align: center; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-value { font-size: 32px; font-weight: 700; color: #667eea; }
    .stat-label { color: #64748b; font-size: 14px; }
    
    .two-columns { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px; }
    .card-premium { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .card-header { padding: 20px 25px; border-bottom: 1px solid #e2e8f0; }
    .card-header h3 { font-size: 18px; font-weight: 600; margin: 0; }
    .list-group { padding: 0; }
    .list-item { display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #e2e8f0; }
    
    .profile-avatar { width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: bold; color: white; margin: 0 auto 15px; }
    .info-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #e2e8f0; }
    .btn-action { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 10px; border-radius: 12px; color: white; width: 100%; text-align: center; display: inline-block; text-decoration: none; margin-top: 15px; }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
        .stats-grid { grid-template-columns: 1fr; }
        .two-columns { grid-template-columns: 1fr; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"sidebar\">
    <div class=\"logo\"><h2>❤️ PSYDESK</h2></div>
    <div class=\"nav-menu\">
        <div class=\"nav-item active\"><a href=\"{{ path('app_patient_dashboard') }}\"><i class=\"ri-dashboard-line\"></i> Tableau de bord</a></div>
        <div class=\"nav-item\"><a href=\"#\"><i class=\"ri-calendar-line\"></i> Mes rendez-vous</a></div>
        <div class=\"nav-item\"><a href=\"#\"><i class=\"ri-message-line\"></i> Messages</a></div>
        <div class=\"nav-item\"><a href=\"{{ path('app_profile') }}\"><i class=\"ri-user-line\"></i> Mon profil</a></div>
        <div class=\"nav-item\"><a href=\"{{ path('app_logout') }}\"><i class=\"ri-logout-box-line\"></i> Déconnexion</a></div>
    </div>
</div>

<div class=\"main-content\">
    <div class=\"top-bar\">
        <div class=\"page-title\"><h1>Mon espace santé</h1><p>Bienvenue, {{ user.prenom }} 👋</p></div>
        <div class=\"user-info\"><span>Patient</span><div class=\"user-avatar\">{{ user.prenom|first|upper }}{{ user.nom|first|upper }}</div></div>
    </div>

    <div class=\"welcome-card\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-8\"><h2 class=\"fw-bold mb-2\">👋 Bonjour, {{ user.prenom }} !</h2><p class=\"mb-0\">Bienvenue dans votre espace santé. Prenez soin de vous.</p></div>
            <div class=\"col-md-4 text-end\"><i class=\"ri-heart-pulse-line fs-1 opacity-50\"></i></div>
        </div>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card\"><div class=\"stat-value\">0</div><div class=\"stat-label\">Prochains RDV</div></div>
        <div class=\"stat-card\"><div class=\"stat-value\">{{ user.age }}</div><div class=\"stat-label\">Âge</div></div>
        <div class=\"stat-card\"><div class=\"stat-value\">0</div><div class=\"stat-label\">Consultations</div></div>
    </div>

    <div class=\"two-columns\">
        <div class=\"card-premium\">
            <div class=\"card-header\"><h3>👤 Mon profil</h3></div>
            <div style=\"padding: 25px; text-align: center;\">
                <div class=\"profile-avatar\">{{ user.prenom|first|upper }}{{ user.nom|first|upper }}</div>
                <h4>{{ user.fullName }}</h4>
                <p class=\"text-muted\">Patient</p>
                <hr>
                <div class=\"info-row\"><strong>Email</strong><span>{{ user.email }}</span></div>
                <div class=\"info-row\"><strong>Âge</strong><span>{{ user.age }} ans</span></div>
                <a href=\"{{ path('app_profile') }}\" class=\"btn-action\">Modifier mon profil</a>
            </div>
        </div>
        <div class=\"card-premium\">
            <div class=\"card-header\"><h3>📅 Prochains rendez-vous</h3></div>
            <div class=\"list-group\">
                <div class=\"list-item text-center\" style=\"justify-content: center;\"><span class=\"text-muted\">Aucun rendez-vous programmé</span></div>
            </div>
            <div style=\"padding: 20px; text-align: center;\"><button class=\"btn-action\" style=\"width: auto; padding: 10px 25px;\">Prendre rendez-vous</button></div>
        </div>
    </div>

    <div class=\"card-premium\">
        <div class=\"card-header\"><h3><i class=\"ri-information-line\"></i> Conseils santé</h3></div>
        <div class=\"list-group\">
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Buvez au moins 2 litres d'eau par jour</span></div>
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Faites 30 minutes d'exercice quotidiennement</span></div>
            <div class=\"list-item\"><span><i class=\"ri-checkbox-circle-line text-success\"></i> Dormez 7 à 8 heures par nuit</span></div>
        </div>
    </div>
</div>
{% endblock %}", "dashboard/patient.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\dashboard\\patient.html.twig");
    }
}
