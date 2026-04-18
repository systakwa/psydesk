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

/* history/index.html.twig */
class __TwigTemplate_ff966b603ee7c99109df6980f9ddeb74 extends Template
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
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "history/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "history/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Historique des actions | PSYDESK";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
        }
        .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }
        
        /* Filters */
        .filters-bar {
            background: white;
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        .filter-btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            color: #2e129f;
        }
        .filter-btn:hover, .filter-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }
        .date-input {
            padding: 8px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            cursor: pointer;
        }
        .clear-btn {
            background: #a43ba4;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        
        /* History Table */
        .history-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            overflow-x: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background: #f8fafc;
            font-weight: 600;
            color: #557fc3;
        }
        
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        .badge-login { background: #d34bbc; color: white; }
        .badge-create { background: #b828b8; color: white; }
        .badge-edit { background: #cd6adb; color: white; }
        .badge-delete { background: #de71b8; color: white; }
        .badge-reset_password { background: #8b5cf6; color: white; }
        
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 124
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 125
        yield "    <!-- Ligne d'en-tête Corona -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/dashboard/Group126@2x.png"), "html", null, true);
        yield "\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Historique des actions</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Traçabilité complète de toutes les actions</p>
                        </div>
                        <div class=\"col-3 col-sm-2 col-xl-2 pl-0 text-center\">
                            <form method=\"post\" action=\"";
        // line 139
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_clear");
        yield "\" onsubmit=\"return confirm('Supprimer tout l\\'historique ? Cette action est irréversible.')\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("clear_history"), "html", null, true);
        yield "\">
                                <button type=\"submit\" class=\"btn btn-outline-light btn-rounded\">🗑️ Vider l'historique</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #667eea;\">";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalActions"]) || array_key_exists("totalActions", $context) ? $context["totalActions"] : (function () { throw new RuntimeError('Variable "totalActions" does not exist.', 153, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total actions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #a23286;\">";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalConnexions"]) || array_key_exists("totalConnexions", $context) ? $context["totalConnexions"] : (function () { throw new RuntimeError('Variable "totalConnexions" does not exist.', 157, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Connexions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #667eea;\">";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalCreations"]) || array_key_exists("totalCreations", $context) ? $context["totalCreations"] : (function () { throw new RuntimeError('Variable "totalCreations" does not exist.', 161, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Créations</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #964792;\">";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalModifications"]) || array_key_exists("totalModifications", $context) ? $context["totalModifications"] : (function () { throw new RuntimeError('Variable "totalModifications" does not exist.', 165, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Modifications</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #ef44bf;\">";
        // line 169
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalSuppressions"]) || array_key_exists("totalSuppressions", $context) ? $context["totalSuppressions"] : (function () { throw new RuntimeError('Variable "totalSuppressions" does not exist.', 169, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Suppressions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #8b5cf6;\">";
        // line 173
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalResetPassword"]) || array_key_exists("totalResetPassword", $context) ? $context["totalResetPassword"] : (function () { throw new RuntimeError('Variable "totalResetPassword" does not exist.', 173, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Reset password</div>
        </div>
    </div>

    <!-- Filtres -->
    <div class=\"filters-bar\">
        <a href=\"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "all"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 180, $this->source); })()) == "all")) {
            yield "active";
        }
        yield "\">Tous</a>
        <a href=\"";
        // line 181
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "login"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 181, $this->source); })()) == "login")) {
            yield "active";
        }
        yield "\">Connexions</a>
        <a href=\"";
        // line 182
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "create"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 182, $this->source); })()) == "create")) {
            yield "active";
        }
        yield "\">Créations</a>
        <a href=\"";
        // line 183
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "edit"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 183, $this->source); })()) == "edit")) {
            yield "active";
        }
        yield "\">Modifications</a>
        <a href=\"";
        // line 184
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "delete"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 184, $this->source); })()) == "delete")) {
            yield "active";
        }
        yield "\">Suppressions</a>
        <a href=\"";
        // line 185
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index", ["filter" => "reset_password"]);
        yield "\" class=\"filter-btn ";
        if (((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 185, $this->source); })()) == "reset_password")) {
            yield "active";
        }
        yield "\">Reset password</a>

        <input type=\"date\" id=\"dateFilter\" class=\"date-input\" value=\"";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentDate"]) || array_key_exists("currentDate", $context) ? $context["currentDate"] : (function () { throw new RuntimeError('Variable "currentDate" does not exist.', 187, $this->source); })()), "html", null, true);
        yield "\">
        <button id=\"applyDateBtn\" class=\"filter-btn\">Appliquer date</button>
        <button id=\"clearDateBtn\" class=\"clear-btn\">Effacer date</button>
    </div>

    <!-- Tableau de l'historique -->
    <div class=\"history-card\">
        ";
        // line 194
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 194, $this->source); })()))) {
            // line 195
            yield "            <div style=\"text-align: center; padding: 60px;\">
                <i class=\"ri-history-line\" style=\"font-size: 64px; color: #cbd5e1;\"></i>
                <p style=\"margin-top: 20px; color: #64748b;\">Aucune action enregistrée pour le moment</p>
            </div>
        ";
        } else {
            // line 200
            yield "            <div style=\"overflow-x: auto;\">
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Utilisateur concerné</th>
                            <th>Détails</th>
                            <th>IP</th>
                            <th>Modifié par</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 214
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["history"]) || array_key_exists("history", $context) ? $context["history"] : (function () { throw new RuntimeError('Variable "history" does not exist.', 214, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 215
                yield "                            <tr>
                                <td>#";
                // line 216
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 216), "html", null, true);
                yield "</div>
                                <td>";
                // line 217
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "createdAt", [], "any", false, false, false, 217), "d/m/Y H:i:s"), "html", null, true);
                yield "</div>
                                <td>
                                    ";
                // line 219
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "actionType", [], "any", false, false, false, 219) == "login")) {
                    // line 220
                    yield "                                        <span class=\"badge badge-login\">Connexion</span>
                                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 221
$context["item"], "actionType", [], "any", false, false, false, 221) == "create")) {
                    // line 222
                    yield "                                        <span class=\"badge badge-create\">Création</span>
                                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 223
$context["item"], "actionType", [], "any", false, false, false, 223) == "edit")) {
                    // line 224
                    yield "                                        <span class=\"badge badge-edit\">Modification</span>
                                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 225
$context["item"], "actionType", [], "any", false, false, false, 225) == "delete")) {
                    // line 226
                    yield "                                        <span class=\"badge badge-delete\">Suppression</span>
                                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 227
$context["item"], "actionType", [], "any", false, false, false, 227) == "reset_password")) {
                    // line 228
                    yield "                                        <span class=\"badge badge-reset_password\">Reset password</span>
                                    ";
                } else {
                    // line 230
                    yield "                                        <span class=\"badge\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "actionType", [], "any", false, false, false, 230), "html", null, true);
                    yield "</span>
                                    ";
                }
                // line 232
                yield "                                 </div>
                                <td>
                                    <strong>ID: ";
                // line 234
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "userId", [], "any", false, false, false, 234), "html", null, true);
                yield "</strong>
                                 </div>
                                <td>";
                // line 236
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "newValue", [], "any", false, false, false, 236), 0, 100), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "newValue", [], "any", false, false, false, 236)) > 100)) {
                    yield "...";
                }
                yield "</div>
                                <td>";
                // line 237
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ipAddress", [], "any", false, false, false, 237)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ipAddress", [], "any", false, false, false, 237), "html", null, true)) : ("-"));
                yield "</div>
                                <td>ID: ";
                // line 238
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "modifiedBy", [], "any", false, false, false, 238)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "modifiedBy", [], "any", false, false, false, 238), "html", null, true)) : ("-"));
                yield "</div>
                             </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 241
            yield "                    </tbody>
                 </div>
            </div>
        ";
        }
        // line 245
        yield "    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 248
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 249
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        const dateFilter = document.getElementById('dateFilter');
        const applyDateBtn = document.getElementById('applyDateBtn');
        const clearDateBtn = document.getElementById('clearDateBtn');

        applyDateBtn.addEventListener('click', function() {
            const date = dateFilter.value;
            if (date) {
                window.location.href = \"";
        // line 258
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index");
        yield "?filter=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 258, $this->source); })()), "html", null, true);
        yield "&date=\" + date;
            }
        });

        clearDateBtn.addEventListener('click', function() {
            window.location.href = \"";
        // line 263
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index");
        yield "?filter=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentFilter"]) || array_key_exists("currentFilter", $context) ? $context["currentFilter"] : (function () { throw new RuntimeError('Variable "currentFilter" does not exist.', 263, $this->source); })()), "html", null, true);
        yield "\";
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
        return "history/index.html.twig";
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
        return array (  542 => 263,  532 => 258,  519 => 249,  506 => 248,  494 => 245,  488 => 241,  479 => 238,  475 => 237,  468 => 236,  463 => 234,  459 => 232,  453 => 230,  449 => 228,  447 => 227,  444 => 226,  442 => 225,  439 => 224,  437 => 223,  434 => 222,  432 => 221,  429 => 220,  427 => 219,  422 => 217,  418 => 216,  415 => 215,  411 => 214,  395 => 200,  388 => 195,  386 => 194,  376 => 187,  367 => 185,  359 => 184,  351 => 183,  343 => 182,  335 => 181,  327 => 180,  317 => 173,  310 => 169,  303 => 165,  296 => 161,  289 => 157,  282 => 153,  266 => 140,  262 => 139,  252 => 132,  243 => 125,  230 => 124,  102 => 7,  89 => 6,  66 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
{% extends 'base.html.twig' %}

{% block title %}Historique des actions | PSYDESK{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link href=\"https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css\" rel=\"stylesheet\">
    <style>
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
        }
        .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }
        
        /* Filters */
        .filters-bar {
            background: white;
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        .filter-btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            color: #2e129f;
        }
        .filter-btn:hover, .filter-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }
        .date-input {
            padding: 8px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            cursor: pointer;
        }
        .clear-btn {
            background: #a43ba4;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        
        /* History Table */
        .history-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            overflow-x: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background: #f8fafc;
            font-weight: 600;
            color: #557fc3;
        }
        
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        .badge-login { background: #d34bbc; color: white; }
        .badge-create { background: #b828b8; color: white; }
        .badge-edit { background: #cd6adb; color: white; }
        .badge-delete { background: #de71b8; color: white; }
        .badge-reset_password { background: #8b5cf6; color: white; }
        
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
{% endblock %}

{% block content %}
    <!-- Ligne d'en-tête Corona -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"{{ asset('assets/images/dashboard/Group126@2x.png') }}\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Historique des actions</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Traçabilité complète de toutes les actions</p>
                        </div>
                        <div class=\"col-3 col-sm-2 col-xl-2 pl-0 text-center\">
                            <form method=\"post\" action=\"{{ path('app_history_clear') }}\" onsubmit=\"return confirm('Supprimer tout l\\'historique ? Cette action est irréversible.')\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('clear_history') }}\">
                                <button type=\"submit\" class=\"btn btn-outline-light btn-rounded\">🗑️ Vider l'historique</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques -->
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #667eea;\">{{ totalActions }}</div>
            <div class=\"stat-label\">Total actions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #a23286;\">{{ totalConnexions }}</div>
            <div class=\"stat-label\">Connexions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #667eea;\">{{ totalCreations }}</div>
            <div class=\"stat-label\">Créations</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #964792;\">{{ totalModifications }}</div>
            <div class=\"stat-label\">Modifications</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #ef44bf;\">{{ totalSuppressions }}</div>
            <div class=\"stat-label\">Suppressions</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-number\" style=\"color: #8b5cf6;\">{{ totalResetPassword }}</div>
            <div class=\"stat-label\">Reset password</div>
        </div>
    </div>

    <!-- Filtres -->
    <div class=\"filters-bar\">
        <a href=\"{{ path('app_history_index', {'filter': 'all'}) }}\" class=\"filter-btn {% if currentFilter == 'all' %}active{% endif %}\">Tous</a>
        <a href=\"{{ path('app_history_index', {'filter': 'login'}) }}\" class=\"filter-btn {% if currentFilter == 'login' %}active{% endif %}\">Connexions</a>
        <a href=\"{{ path('app_history_index', {'filter': 'create'}) }}\" class=\"filter-btn {% if currentFilter == 'create' %}active{% endif %}\">Créations</a>
        <a href=\"{{ path('app_history_index', {'filter': 'edit'}) }}\" class=\"filter-btn {% if currentFilter == 'edit' %}active{% endif %}\">Modifications</a>
        <a href=\"{{ path('app_history_index', {'filter': 'delete'}) }}\" class=\"filter-btn {% if currentFilter == 'delete' %}active{% endif %}\">Suppressions</a>
        <a href=\"{{ path('app_history_index', {'filter': 'reset_password'}) }}\" class=\"filter-btn {% if currentFilter == 'reset_password' %}active{% endif %}\">Reset password</a>

        <input type=\"date\" id=\"dateFilter\" class=\"date-input\" value=\"{{ currentDate }}\">
        <button id=\"applyDateBtn\" class=\"filter-btn\">Appliquer date</button>
        <button id=\"clearDateBtn\" class=\"clear-btn\">Effacer date</button>
    </div>

    <!-- Tableau de l'historique -->
    <div class=\"history-card\">
        {% if history is empty %}
            <div style=\"text-align: center; padding: 60px;\">
                <i class=\"ri-history-line\" style=\"font-size: 64px; color: #cbd5e1;\"></i>
                <p style=\"margin-top: 20px; color: #64748b;\">Aucune action enregistrée pour le moment</p>
            </div>
        {% else %}
            <div style=\"overflow-x: auto;\">
                <table class=\"table\">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Utilisateur concerné</th>
                            <th>Détails</th>
                            <th>IP</th>
                            <th>Modifié par</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for item in history %}
                            <tr>
                                <td>#{{ item.id }}</div>
                                <td>{{ item.createdAt|date('d/m/Y H:i:s') }}</div>
                                <td>
                                    {% if item.actionType == 'login' %}
                                        <span class=\"badge badge-login\">Connexion</span>
                                    {% elseif item.actionType == 'create' %}
                                        <span class=\"badge badge-create\">Création</span>
                                    {% elseif item.actionType == 'edit' %}
                                        <span class=\"badge badge-edit\">Modification</span>
                                    {% elseif item.actionType == 'delete' %}
                                        <span class=\"badge badge-delete\">Suppression</span>
                                    {% elseif item.actionType == 'reset_password' %}
                                        <span class=\"badge badge-reset_password\">Reset password</span>
                                    {% else %}
                                        <span class=\"badge\">{{ item.actionType }}</span>
                                    {% endif %}
                                 </div>
                                <td>
                                    <strong>ID: {{ item.userId }}</strong>
                                 </div>
                                <td>{{ item.newValue|slice(0, 100) }}{% if item.newValue|length > 100 %}...{% endif %}</div>
                                <td>{{ item.ipAddress ?: '-' }}</div>
                                <td>ID: {{ item.modifiedBy ?: '-' }}</div>
                             </div>
                        {% endfor %}
                    </tbody>
                 </div>
            </div>
        {% endif %}
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        const dateFilter = document.getElementById('dateFilter');
        const applyDateBtn = document.getElementById('applyDateBtn');
        const clearDateBtn = document.getElementById('clearDateBtn');

        applyDateBtn.addEventListener('click', function() {
            const date = dateFilter.value;
            if (date) {
                window.location.href = \"{{ path('app_history_index') }}?filter={{ currentFilter }}&date=\" + date;
            }
        });

        clearDateBtn.addEventListener('click', function() {
            window.location.href = \"{{ path('app_history_index') }}?filter={{ currentFilter }}\";
        });
    </script>
{% endblock %}", "history/index.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\history\\index.html.twig");
    }
}
