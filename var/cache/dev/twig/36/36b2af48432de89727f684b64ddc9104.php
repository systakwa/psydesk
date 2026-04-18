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

/* dashboard/psychologue_statistiques.html.twig */
class __TwigTemplate_7294f49891b312dc76c5ebe3158e740c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/psychologue_statistiques.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/psychologue_statistiques.html.twig"));

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

        yield "Statistiques | PSYDESK - Psychologue";
        
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
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<style>
    * { font-family: 'Inter', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f5f7fb; }
    
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(135deg, #e965d5 0%, #b16da5 100%);
        z-index: 1000;
    }
    .sidebar .logo { padding: 25px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar .logo h2 { color: white; font-weight: 700; }
    .sidebar .nav-item { margin: 8px 15px; border-radius: 12px; }
    .sidebar .nav-item a { padding: 12px 20px; display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 12px; }
    .sidebar .nav-item a:hover, .sidebar .nav-item.active a { background: rgba(255,255,255,0.15); color: white; }
    
    .main-content { margin-left: 280px; padding: 25px 30px; }
    
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .page-title h1 { font-size: 28px; font-weight: 700; color: #698eca; margin-bottom: 5px; }
    .user-info { display: flex; align-items: center; gap: 15px; background: white; padding: 8px 20px; border-radius: 50px; }
    .user-avatar { width: 45px; height: 45px; background: linear-gradient(135deg, #c854ba 0%, #96057b 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
    
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; margin-bottom: 30px; }
    .stat-card { background: white; border-radius: 20px; padding: 20px; text-align: center; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-value { font-size: 32px; font-weight: 700; color: #c29dc3; }
    .stat-label { color: #64748b; font-size: 14px; }
    .stat-change { font-size: 12px; margin-top: 8px; }
    .stat-change.up { color: #d5a9ce; }
    
    .chart-card { background: white; border-radius: 20px; padding: 20px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .chart-title { font-weight: bold; margin-bottom: 20px; font-size: 18px; }
    
    .card-premium { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px; }
    .card-header { padding: 20px 25px; border-bottom: 1px solid #e2e8f0; }
    .card-header h3 { font-size: 18px; font-weight: 600; margin: 0; }
    .list-group { padding: 0; }
    .list-item { display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #e2e8f0; }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
        .stats-grid { grid-template-columns: 1fr; }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 59
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

        // line 60
        yield "<div class=\"sidebar\">
    <div class=\"logo\"><h2>PSYDESK</h2></div>
    <div class=\"nav-menu\">
        <div class=\"nav-item\">
            <a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_psychologue_dashboard");
        yield "\">
                <i class=\"ri-dashboard-line\"></i> Tableau de bord
            </a>
        </div>
        <div class=\"nav-item active\">
            <a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_psychologue_statistiques");
        yield "\">
                <i class=\"ri-bar-chart-line\"></i> Statistiques
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"#\">
                <i class=\"ri-user-line\"></i> Mes patients
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"#\">
                <i class=\"ri-calendar-line\"></i> Rendez-vous
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
                <i class=\"ri-user-settings-line\"></i> Mon profil
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"";
        // line 89
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
            <h1>Statistiques</h1>
            <p>Analyse de votre activité, Dr ";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 100, $this->source); })()), "nom", [], "any", false, false, false, 100), "html", null, true);
        yield " </p>
        </div>
        <div class=\"user-info\">
            <span>Psychologue</span>
            <div class=\"user-avatar\">";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 104, $this->source); })()), "prenom", [], "any", false, false, false, 104))), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 104, $this->source); })()), "nom", [], "any", false, false, false, 104))), "html", null, true);
        yield "</div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-value\">0</div>
            <div class=\"stat-label\">Patients actifs</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> +0% ce mois</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\">0</div>
            <div class=\"stat-label\">Rendez-vous</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> +0% ce mois</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\"> 5.0</div>
            <div class=\"stat-label\">Évaluation</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> Excellent</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\">";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 126, $this->source); })()), "age", [], "any", false, false, false, 126), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Âge</div>
            <div class=\"stat-change\">Psychologue</div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"chart-card\">
                <div class=\"chart-title\">
                    <i class=\"ri-pie-chart-line\" style=\"color: #d17ccd;\"></i> Répartition des patients
                </div>
                <canvas id=\"patientsChart\" height=\"200\"></canvas>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"chart-card\">
                <div class=\"chart-title\">
                    <i class=\"ri-bar-chart-line\" style=\"color: #db8eca;\"></i> Évolution des consultations
                </div>
                <canvas id=\"consultationsChart\" height=\"200\"></canvas>
            </div>
        </div>
    </div>

    <!-- Statistiques détaillées -->
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"card-premium\">
                <div class=\"card-header\"><h3><i class=\"ri-information-line\"></i> Informations générales</h3></div>
                <div class=\"list-group\">
                    <div class=\"list-item\"><span><i class=\"ri-user-line\"></i> Patients actifs</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-calendar-line\"></i> Rendez-vous total</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-time-line\"></i> Heures de consultation</span><strong>0h</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-star-line\"></i> Taux de satisfaction</span><strong>100%</strong></div>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card-premium\">
                <div class=\"card-header\"><h3><i class=\"ri-calculator-line\"></i> Statistiques avancées</h3></div>
                <div class=\"list-group\">
                    <div class=\"list-item\"><span><i class=\"ri-cake-line\"></i> Âge moyen des patients</span><strong>0 ans</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-repeat-line\"></i> Taux de fidélisation</span><strong>0%</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-calendar-check-line\"></i> Rendez-vous par mois</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-user-star-line\"></i> Nouveaux patients (mois)</span><strong>0</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Graphique de répartition
    new Chart(document.getElementById('patientsChart'), {
        type: 'doughnut',
        data: {
            labels: ['Hommes', 'Femmes', 'Autres'],
            datasets: [{
                data: [0, 0, 0],
                backgroundColor: ['#e090ce', '#ec5ddb', '#d59fd1'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Graphique d'évolution
    new Chart(document.getElementById('consultationsChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Consultations',
                data: [0, 0, 0, 0, 0, 0],
                borderColor: '#c485da',
                backgroundColor: 'rgba(16,185,129,0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>
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
        return "dashboard/psychologue_statistiques.html.twig";
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
        return array (  263 => 126,  237 => 104,  230 => 100,  216 => 89,  208 => 84,  190 => 69,  182 => 64,  176 => 60,  163 => 59,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Statistiques | PSYDESK - Psychologue{% endblock %}

{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<style>
    * { font-family: 'Inter', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f5f7fb; }
    
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(135deg, #e965d5 0%, #b16da5 100%);
        z-index: 1000;
    }
    .sidebar .logo { padding: 25px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar .logo h2 { color: white; font-weight: 700; }
    .sidebar .nav-item { margin: 8px 15px; border-radius: 12px; }
    .sidebar .nav-item a { padding: 12px 20px; display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 12px; }
    .sidebar .nav-item a:hover, .sidebar .nav-item.active a { background: rgba(255,255,255,0.15); color: white; }
    
    .main-content { margin-left: 280px; padding: 25px 30px; }
    
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .page-title h1 { font-size: 28px; font-weight: 700; color: #698eca; margin-bottom: 5px; }
    .user-info { display: flex; align-items: center; gap: 15px; background: white; padding: 8px 20px; border-radius: 50px; }
    .user-avatar { width: 45px; height: 45px; background: linear-gradient(135deg, #c854ba 0%, #96057b 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
    
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; margin-bottom: 30px; }
    .stat-card { background: white; border-radius: 20px; padding: 20px; text-align: center; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-value { font-size: 32px; font-weight: 700; color: #c29dc3; }
    .stat-label { color: #64748b; font-size: 14px; }
    .stat-change { font-size: 12px; margin-top: 8px; }
    .stat-change.up { color: #d5a9ce; }
    
    .chart-card { background: white; border-radius: 20px; padding: 20px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .chart-title { font-weight: bold; margin-bottom: 20px; font-size: 18px; }
    
    .card-premium { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px; }
    .card-header { padding: 20px 25px; border-bottom: 1px solid #e2e8f0; }
    .card-header h3 { font-size: 18px; font-weight: 600; margin: 0; }
    .list-group { padding: 0; }
    .list-item { display: flex; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #e2e8f0; }
    
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; }
        .stats-grid { grid-template-columns: 1fr; }
    }
</style>
{% endblock %}

{% block body %}
<div class=\"sidebar\">
    <div class=\"logo\"><h2>PSYDESK</h2></div>
    <div class=\"nav-menu\">
        <div class=\"nav-item\">
            <a href=\"{{ path('app_psychologue_dashboard') }}\">
                <i class=\"ri-dashboard-line\"></i> Tableau de bord
            </a>
        </div>
        <div class=\"nav-item active\">
            <a href=\"{{ path('app_psychologue_statistiques') }}\">
                <i class=\"ri-bar-chart-line\"></i> Statistiques
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"#\">
                <i class=\"ri-user-line\"></i> Mes patients
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"#\">
                <i class=\"ri-calendar-line\"></i> Rendez-vous
            </a>
        </div>
        <div class=\"nav-item\">
            <a href=\"{{ path('app_profile') }}\">
                <i class=\"ri-user-settings-line\"></i> Mon profil
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
            <h1>Statistiques</h1>
            <p>Analyse de votre activité, Dr {{ user.nom }} </p>
        </div>
        <div class=\"user-info\">
            <span>Psychologue</span>
            <div class=\"user-avatar\">{{ user.prenom|first|upper }}{{ user.nom|first|upper }}</div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-value\">0</div>
            <div class=\"stat-label\">Patients actifs</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> +0% ce mois</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\">0</div>
            <div class=\"stat-label\">Rendez-vous</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> +0% ce mois</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\"> 5.0</div>
            <div class=\"stat-label\">Évaluation</div>
            <div class=\"stat-change up\"><i class=\"ri-arrow-up-line\"></i> Excellent</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-value\">{{ user.age }}</div>
            <div class=\"stat-label\">Âge</div>
            <div class=\"stat-change\">Psychologue</div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"chart-card\">
                <div class=\"chart-title\">
                    <i class=\"ri-pie-chart-line\" style=\"color: #d17ccd;\"></i> Répartition des patients
                </div>
                <canvas id=\"patientsChart\" height=\"200\"></canvas>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"chart-card\">
                <div class=\"chart-title\">
                    <i class=\"ri-bar-chart-line\" style=\"color: #db8eca;\"></i> Évolution des consultations
                </div>
                <canvas id=\"consultationsChart\" height=\"200\"></canvas>
            </div>
        </div>
    </div>

    <!-- Statistiques détaillées -->
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"card-premium\">
                <div class=\"card-header\"><h3><i class=\"ri-information-line\"></i> Informations générales</h3></div>
                <div class=\"list-group\">
                    <div class=\"list-item\"><span><i class=\"ri-user-line\"></i> Patients actifs</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-calendar-line\"></i> Rendez-vous total</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-time-line\"></i> Heures de consultation</span><strong>0h</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-star-line\"></i> Taux de satisfaction</span><strong>100%</strong></div>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card-premium\">
                <div class=\"card-header\"><h3><i class=\"ri-calculator-line\"></i> Statistiques avancées</h3></div>
                <div class=\"list-group\">
                    <div class=\"list-item\"><span><i class=\"ri-cake-line\"></i> Âge moyen des patients</span><strong>0 ans</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-repeat-line\"></i> Taux de fidélisation</span><strong>0%</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-calendar-check-line\"></i> Rendez-vous par mois</span><strong>0</strong></div>
                    <div class=\"list-item\"><span><i class=\"ri-user-star-line\"></i> Nouveaux patients (mois)</span><strong>0</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Graphique de répartition
    new Chart(document.getElementById('patientsChart'), {
        type: 'doughnut',
        data: {
            labels: ['Hommes', 'Femmes', 'Autres'],
            datasets: [{
                data: [0, 0, 0],
                backgroundColor: ['#e090ce', '#ec5ddb', '#d59fd1'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Graphique d'évolution
    new Chart(document.getElementById('consultationsChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Consultations',
                data: [0, 0, 0, 0, 0, 0],
                borderColor: '#c485da',
                backgroundColor: 'rgba(16,185,129,0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>
{% endblock %}", "dashboard/psychologue_statistiques.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\dashboard\\psychologue_statistiques.html.twig");
    }
}
