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

/* dashboard/admin.html.twig */
class __TwigTemplate_5e938f4e0d796951f2aeb544e6d79be7 extends Template
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
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/admin.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/admin.html.twig"));

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

        yield "Administration | PSYDESK";
        
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
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        /* Réutilisation des styles de recherche depuis l'ancien dashboard */
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #6ca0e3;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(49, 82, 231, 0.1);
        }
        .search-btn {
            background: linear-gradient(135deg, #7682b6 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        }
        .reset-btn {
            background: #64748b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        .reset-btn:hover {
            background: #5d89c6;
        }
        .no-result {
            text-align: center;
            padding: 40px;
            color: #ee9cec;
            font-size: 16px;
        }
        /* Ajustement des cartes stats */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #d8afd7;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 76
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

        // line 77
        yield "    <!-- Ligne promo (identique au nouveau dashboard) -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/dashboard/Group126@2x.png"), "html", null, true);
        yield "\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Administration PSYDESK</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Gérez les utilisateurs, consultez l'historique et les statistiques.</p>
                        </div>
                        <div class=\"col-3 col-sm-2 col-xl-2 pl-0 text-center\">
                            <span>
                                <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-outline-light btn-rounded get-started-btn\">+ Nouvel utilisateur</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques (données réelles) -->
    <div class=\"row\">
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalUsers\">";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 109, $this->source); })())), "html", null, true);
        yield "</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-multiple icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Total utilisateurs</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalPatients\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 128, $this->source); })()), function ($__u__) use ($context, $macros) { $context["u"] = $__u__; return CoreExtension::inFilter("ROLE_PATIENT", CoreExtension::getAttribute($this->env, $this->source, (isset($context["u"]) || array_key_exists("u", $context) ? $context["u"] : (function () { throw new RuntimeError('Variable "u" does not exist.', 128, $this->source); })()), "roles", [], "any", false, false, false, 128)); })), "html", null, true);
        yield "</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-heart icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Patients</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalPsychologues\">";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 147, $this->source); })()), function ($__u__) use ($context, $macros) { $context["u"] = $__u__; return CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, (isset($context["u"]) || array_key_exists("u", $context) ? $context["u"] : (function () { throw new RuntimeError('Variable "u" does not exist.', 147, $this->source); })()), "roles", [], "any", false, false, false, 147)); })), "html", null, true);
        yield "</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-tie icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Psychologues</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalAdmins\">";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 166, $this->source); })()), function ($__u__) use ($context, $macros) { $context["u"] = $__u__; return CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["u"]) || array_key_exists("u", $context) ? $context["u"] : (function () { throw new RuntimeError('Variable "u" does not exist.', 166, $this->source); })()), "roles", [], "any", false, false, false, 166)); })), "html", null, true);
        yield "</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-shield-account icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Administrateurs</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages flash -->
    ";
        // line 182
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 182, $this->source); })()), "flashes", ["success"], "method", false, false, false, 182));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 183
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 185, $this->source); })()), "flashes", ["error"], "method", false, false, false, 185));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 186
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 188
        yield "
    <!-- Tableau des utilisateurs avec recherche -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                        <h4 class=\"card-title\">Liste des utilisateurs</h4>
                        <a href=\"";
        // line 196
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_history_index");
        yield "\" class=\"btn btn-sm btn-outline-primary\">📜 Historique des actions</a>
                    </div>

                    <!-- Barre de recherche -->
                    <div class=\"search-bar\">
                        <input type=\"text\" id=\"searchInput\" class=\"search-input\" placeholder=\"Rechercher par nom, prénom, email ou rôle...\">
                        <button id=\"searchBtn\" class=\"search-btn\">Rechercher</button>
                        <button id=\"resetBtn\" class=\"reset-btn\">Réinitialiser</button>
                    </div>

                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Âge</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id=\"userTableBody\">
                                ";
        // line 219
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 219, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 220
            yield "                                    <tr data-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "fullName", [], "any", false, false, false, 220)), "html", null, true);
            yield "\" data-email=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 220)), "html", null, true);
            yield "\" data-role=\"";
            if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, $context["u"], "roles", [], "any", false, false, false, 220))) {
                yield "admin";
            } elseif (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source, $context["u"], "roles", [], "any", false, false, false, 220))) {
                yield "psychologue";
            } else {
                yield "patient";
            }
            yield "\">
                                        <td>";
            // line 221
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 221), "html", null, true);
            yield "</td>
                                        <td><strong>";
            // line 222
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "fullName", [], "any", false, false, false, 222), "html", null, true);
            yield "</strong></td>
                                        <td>";
            // line 223
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 223), "html", null, true);
            yield "</td>
                                        <td>";
            // line 224
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "age", [], "any", false, false, false, 224), "html", null, true);
            yield " ans</td>
                                        <td>
                                            ";
            // line 226
            if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, $context["u"], "roles", [], "any", false, false, false, 226))) {
                // line 227
                yield "                                                <span class=\"badge badge-gradient-primary\">Administrateur</span>
                                            ";
            } elseif (CoreExtension::inFilter("ROLE_PSYCHOLOGUE", CoreExtension::getAttribute($this->env, $this->source,             // line 228
$context["u"], "roles", [], "any", false, false, false, 228))) {
                // line 229
                yield "                                                <span class=\"badge badge-gradient-info\">Psychologue</span>
                                            ";
            } else {
                // line 231
                yield "                                                <span class=\"badge badge-gradient-success\">Patient</span>
                                            ";
            }
            // line 233
            yield "                                        </td>
                                        <td>
                                            <a href=\"";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 235)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Modifier</a>
                                            ";
            // line 236
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 236) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 236, $this->source); })()), "id", [], "any", false, false, false, 236))) {
                // line 237
                yield "                                                <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 237)]), "html", null, true);
                yield "\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "fullName", [], "any", false, false, false, 237), "html", null, true);
                yield " ?')\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 238
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 238))), "html", null, true);
                yield "\">
                                                    <button type=\"submit\" class=\"btn btn-sm btn-danger\">Supprimer</button>
                                                </form>
                                            ";
            } else {
                // line 242
                yield "                                                <span class=\"btn btn-sm btn-secondary disabled\">Vous</span>
                                            ";
            }
            // line 244
            yield "                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 247
        yield "                            </tbody>
                        </table>
                        <div id=\"noResult\" class=\"no-result\" style=\"display: none;\">
                            <i class=\"mdi mdi-account-search\"></i>
                            <p>Aucun utilisateur trouvé</p>
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

    // line 260
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

        // line 261
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Recherche dynamique dans le tableau des utilisateurs
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchBtn = document.getElementById('searchBtn');
            const resetBtn = document.getElementById('resetBtn');
            const tableBody = document.getElementById('userTableBody');
            const noResultDiv = document.getElementById('noResult');
            const totalUsersSpan = document.getElementById('totalUsers');
            const totalPatientsSpan = document.getElementById('totalPatients');
            const totalPsychologuesSpan = document.getElementById('totalPsychologues');
            const totalAdminsSpan = document.getElementById('totalAdmins');

            function searchUsers() {
                const term = searchInput.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');
                let visibleCount = 0;
                let visiblePatients = 0, visiblePsychologues = 0, visibleAdmins = 0;

                rows.forEach(row => {
                    const name = row.getAttribute('data-name') || '';
                    const email = row.getAttribute('data-email') || '';
                    const role = row.getAttribute('data-role') || '';
                    const matches = term === '' || name.includes(term) || email.includes(term) || role.includes(term);
                    row.style.display = matches ? '' : 'none';
                    if (matches) {
                        visibleCount++;
                        if (role === 'patient') visiblePatients++;
                        else if (role === 'psychologue') visiblePsychologues++;
                        else if (role === 'admin') visibleAdmins++;
                    }
                });

                totalUsersSpan.textContent = visibleCount;
                totalPatientsSpan.textContent = visiblePatients;
                totalPsychologuesSpan.textContent = visiblePsychologues;
                totalAdminsSpan.textContent = visibleAdmins;
                noResultDiv.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            searchBtn.addEventListener('click', searchUsers);
            resetBtn.addEventListener('click', function() {
                searchInput.value = '';
                searchUsers();
            });
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') searchUsers();
            });
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
        return "dashboard/admin.html.twig";
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
        return array (  506 => 261,  493 => 260,  471 => 247,  463 => 244,  459 => 242,  452 => 238,  445 => 237,  443 => 236,  439 => 235,  435 => 233,  431 => 231,  427 => 229,  425 => 228,  422 => 227,  420 => 226,  415 => 224,  411 => 223,  407 => 222,  403 => 221,  388 => 220,  384 => 219,  358 => 196,  348 => 188,  339 => 186,  334 => 185,  325 => 183,  321 => 182,  302 => 166,  280 => 147,  258 => 128,  236 => 109,  216 => 92,  205 => 84,  196 => 77,  183 => 76,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Administration | PSYDESK{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        /* Réutilisation des styles de recherche depuis l'ancien dashboard */
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #6ca0e3;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(49, 82, 231, 0.1);
        }
        .search-btn {
            background: linear-gradient(135deg, #7682b6 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        }
        .reset-btn {
            background: #64748b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        .reset-btn:hover {
            background: #5d89c6;
        }
        .no-result {
            text-align: center;
            padding: 40px;
            color: #ee9cec;
            font-size: 16px;
        }
        /* Ajustement des cartes stats */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #d8afd7;
        }
    </style>
{% endblock %}

{% block content %}
    <!-- Ligne promo (identique au nouveau dashboard) -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"{{ asset('assets/images/dashboard/Group126@2x.png') }}\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Administration PSYDESK</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Gérez les utilisateurs, consultez l'historique et les statistiques.</p>
                        </div>
                        <div class=\"col-3 col-sm-2 col-xl-2 pl-0 text-center\">
                            <span>
                                <a href=\"{{ path('app_register') }}\" class=\"btn btn-outline-light btn-rounded get-started-btn\">+ Nouvel utilisateur</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques (données réelles) -->
    <div class=\"row\">
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalUsers\">{{ users|length }}</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-multiple icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Total utilisateurs</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalPatients\">{{ users|filter(u => 'ROLE_PATIENT' in u.roles)|length }}</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-heart icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Patients</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalPsychologues\">{{ users|filter(u => 'ROLE_PSYCHOLOGUE' in u.roles)|length }}</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-account-tie icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Psychologues</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card stat-card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0 stat-number\" id=\"totalAdmins\">{{ users|filter(u => 'ROLE_ADMIN' in u.roles)|length }}</h3>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <i class=\"mdi mdi-shield-account icon-item\"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Administrateurs</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages flash -->
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <!-- Tableau des utilisateurs avec recherche -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                        <h4 class=\"card-title\">Liste des utilisateurs</h4>
                        <a href=\"{{ path('app_history_index') }}\" class=\"btn btn-sm btn-outline-primary\">📜 Historique des actions</a>
                    </div>

                    <!-- Barre de recherche -->
                    <div class=\"search-bar\">
                        <input type=\"text\" id=\"searchInput\" class=\"search-input\" placeholder=\"Rechercher par nom, prénom, email ou rôle...\">
                        <button id=\"searchBtn\" class=\"search-btn\">Rechercher</button>
                        <button id=\"resetBtn\" class=\"reset-btn\">Réinitialiser</button>
                    </div>

                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Âge</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id=\"userTableBody\">
                                {% for u in users %}
                                    <tr data-name=\"{{ u.fullName|lower }}\" data-email=\"{{ u.email|lower }}\" data-role=\"{% if 'ROLE_ADMIN' in u.roles %}admin{% elseif 'ROLE_PSYCHOLOGUE' in u.roles %}psychologue{% else %}patient{% endif %}\">
                                        <td>{{ u.id }}</td>
                                        <td><strong>{{ u.fullName }}</strong></td>
                                        <td>{{ u.email }}</td>
                                        <td>{{ u.age }} ans</td>
                                        <td>
                                            {% if 'ROLE_ADMIN' in u.roles %}
                                                <span class=\"badge badge-gradient-primary\">Administrateur</span>
                                            {% elseif 'ROLE_PSYCHOLOGUE' in u.roles %}
                                                <span class=\"badge badge-gradient-info\">Psychologue</span>
                                            {% else %}
                                                <span class=\"badge badge-gradient-success\">Patient</span>
                                            {% endif %}
                                        </td>
                                        <td>
                                            <a href=\"{{ path('app_admin_user_edit', {'id': u.id}) }}\" class=\"btn btn-sm btn-warning\">Modifier</a>
                                            {% if u.id != user.id %}
                                                <form method=\"post\" action=\"{{ path('app_admin_user_delete', {'id': u.id}) }}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement {{ u.fullName }} ?')\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ u.id) }}\">
                                                    <button type=\"submit\" class=\"btn btn-sm btn-danger\">Supprimer</button>
                                                </form>
                                            {% else %}
                                                <span class=\"btn btn-sm btn-secondary disabled\">Vous</span>
                                            {% endif %}
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                        <div id=\"noResult\" class=\"no-result\" style=\"display: none;\">
                            <i class=\"mdi mdi-account-search\"></i>
                            <p>Aucun utilisateur trouvé</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Recherche dynamique dans le tableau des utilisateurs
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchBtn = document.getElementById('searchBtn');
            const resetBtn = document.getElementById('resetBtn');
            const tableBody = document.getElementById('userTableBody');
            const noResultDiv = document.getElementById('noResult');
            const totalUsersSpan = document.getElementById('totalUsers');
            const totalPatientsSpan = document.getElementById('totalPatients');
            const totalPsychologuesSpan = document.getElementById('totalPsychologues');
            const totalAdminsSpan = document.getElementById('totalAdmins');

            function searchUsers() {
                const term = searchInput.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');
                let visibleCount = 0;
                let visiblePatients = 0, visiblePsychologues = 0, visibleAdmins = 0;

                rows.forEach(row => {
                    const name = row.getAttribute('data-name') || '';
                    const email = row.getAttribute('data-email') || '';
                    const role = row.getAttribute('data-role') || '';
                    const matches = term === '' || name.includes(term) || email.includes(term) || role.includes(term);
                    row.style.display = matches ? '' : 'none';
                    if (matches) {
                        visibleCount++;
                        if (role === 'patient') visiblePatients++;
                        else if (role === 'psychologue') visiblePsychologues++;
                        else if (role === 'admin') visibleAdmins++;
                    }
                });

                totalUsersSpan.textContent = visibleCount;
                totalPatientsSpan.textContent = visiblePatients;
                totalPsychologuesSpan.textContent = visiblePsychologues;
                totalAdminsSpan.textContent = visibleAdmins;
                noResultDiv.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            searchBtn.addEventListener('click', searchUsers);
            resetBtn.addEventListener('click', function() {
                searchInput.value = '';
                searchUsers();
            });
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') searchUsers();
            });
        });
    </script>
{% endblock %}", "dashboard/admin.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\dashboard\\admin.html.twig");
    }
}
