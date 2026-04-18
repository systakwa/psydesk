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

/* dashboard_Psy/index.html.twig */
class __TwigTemplate_051d41c6952d78682adf456119e1bcb2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard_Psy/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard_Psy/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <title>Dashboard Patient | PsyDesk</title>
    <!-- Favicon -->
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
    <!-- Google fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
    <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
    <!-- Bootstrap icons -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    <!-- Core theme CSS -->
    <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
    <style>
        /* Améliorations navbar */
        .navbar {
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            transition: all 0.2s;
        }
        .navbar-nav .nav-link {
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            border-radius: 40px;
            transition: 0.2s;
        }
        .navbar-nav .nav-link:hover {
            background: #f1f5f9;
            color: #667eea !important;
        }
        .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white !important;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8fafc;
            padding: 6px 14px;
            border-radius: 40px;
            margin-left: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #1e293b;
        }
        .user-info img {
            width: 28px;
            height: 28px;
            object-fit: cover;
            border-radius: 50%;
        }
        .user-info i {
            font-size: 1.2rem;
            color: #667eea;
        }
        @media (max-width: 991.98px) {
            .user-info {
                margin-left: 0;
                margin-top: 10px;
                justify-content: center;
            }
        }
    </style>
</head>
<body class=\"d-flex flex-column h-100\">
    <main class=\"flex-shrink-0\">
        <!-- Navigation avec image de profil uniquement ici -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
            <div class=\"container px-5\">
                <a class=\"navbar-brand\"><span class=\"fw-bolder text-primary\">PsyDesk</span></a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                    <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder align-items-center\">
                        <li class=\"nav-item\"><a class=\"nav-link active\" href=\"#\">Home</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_status_actifs");
        yield "\"> consulter Objectifs</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 81
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a></li>
                        <!-- Affichage de l'image (si existante) + nom -->
                        <li class=\"nav-item\">
                            <div class=\"user-info\">
                                ";
        // line 85
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 85, $this->source); })()), "image", [], "any", false, false, false, 85)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 86
            yield "                                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 86, $this->source); })()), "image", [], "any", false, false, false, 86), "html", null, true);
            yield "\" alt=\"Avatar\" class=\"rounded-circle\">
                                ";
        } else {
            // line 88
            yield "                                    <i class=\"bi bi-person-circle\"></i>
                                ";
        }
        // line 90
        yield "                                <span>";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "prenom", [], "any", true, true, false, 90) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 90, $this->source); })()), "prenom", [], "any", false, false, false, 90)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 90, $this->source); })()), "prenom", [], "any", false, false, false, 90), "html", null, true)) : ("Utilisateur"));
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "nom", [], "any", true, true, false, 90) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 90, $this->source); })()), "nom", [], "any", false, false, false, 90)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 90, $this->source); })()), "nom", [], "any", false, false, false, 90), "html", null, true)) : (""));
        yield "</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header (photo par défaut, pas d'image utilisateur) -->
        <header class=\"py-5\">
            <div class=\"container px-5 pb-5\">
                <div class=\"row gx-5 align-items-center\">
                    <div class=\"col-xxl-5\">
                        <div class=\"text-center text-xxl-start\">
                            <div class=\"badge bg-gradient-primary-to-secondary text-white mb-4\">
                                <div class=\"text-uppercase\">réclamations &middot; objectif &middot;</div>
                            </div>
                            <div class=\"fs-3 fw-light text-muted\">
                                Bienvenue <strong>";
        // line 108
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "prenom", [], "any", true, true, false, 108) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 108, $this->source); })()), "prenom", [], "any", false, false, false, 108)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 108, $this->source); })()), "prenom", [], "any", false, false, false, 108), "html", null, true)) : ("Invité"));
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "nom", [], "any", true, true, false, 108) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 108, $this->source); })()), "nom", [], "any", false, false, false, 108)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 108, $this->source); })()), "nom", [], "any", false, false, false, 108), "html", null, true)) : (""));
        yield "</strong>
                            </div>
                            <h1 class=\"display-3 fw-bolder mb-5\">
                                <span class=\"text-gradient d-inline\">faisons des réclamations</span>
                            </h1>
                        </div>
                    </div>
                    <div class=\"col-xxl-7\">
                        <div class=\"d-flex justify-content-center mt-5 mt-xxl-0\">
                            <div class=\"profile bg-gradient-primary-to-secondary\">
                                <!-- Image par défaut, pas de condition user.image -->
                                <img class=\"profile-img\" src=\"/profile.png\" alt=\"Photo de profil\" />
                                <!-- Dots SVG conservés -->
                                <div class=\"dots-1\">
                                    <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewBox=\"0 0 191.6 1215.4\" style=\"enable-background: new 0 0 191.6 1215.4\" xml:space=\"preserve\">
                                        <g transform=\"translate(0.000000,1280.000000) scale(0.100000,-0.100000)\">
                                            <path d=\"M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z\"></path>
                                            <path d=\"M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z\"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"dots-2\">
                                    <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewBox=\"0 0 191.6 1215.4\" style=\"enable-background: new 0 0 191.6 1215.4\" xml:space=\"preserve\">
                                        <g transform=\"translate(0.000000,1280.000000) scale(0.100000,-0.100000)\">
                                            <path d=\"M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z\"></path>
                                            <path d=\"M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z\"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"dots-3\"></div>
                                <div class=\"dots-4\"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section (inchangée) -->
        <section class=\"bg-light py-5\">
            <div class=\"container px-5\">
                <div class=\"row gx-5 justify-content-center\">
                    <div class=\"col-xxl-8\">
                        <div class=\"text-center my-5\">
                            <h2 class=\"display-5 fw-bolder\"><span class=\"text-gradient d-inline\">À propos</span></h2>
                            <p class=\"lead fw-light mb-4\">Bienvenue sur votre espace patient</p>
                            <p class=\"text-muted\">Ici vous pouvez gérer vos objectifs, suivre vos réclamations et interagir avec votre psychologue.</p>
                            <div class=\"d-flex justify-content-center fs-2 gap-4\">
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-twitter\"></i></a>
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-linkedin\"></i></a>
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-github\"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class=\"bg-white py-4 mt-auto\">
        <div class=\"container px-5\">
            <div class=\"row align-items-center justify-content-between flex-column flex-sm-row\">
                <div class=\"col-auto\"><div class=\"small m-0\">Copyright &copy; PsyDesk 2025</div></div>
                <div class=\"col-auto\">
                    <a class=\"small\" href=\"#!\">Confidentialité</a>
                    <span class=\"mx-1\">&middot;</span>
                    <a class=\"small\" href=\"#!\">Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <script src=\"";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/scripts.js"), "html", null, true);
        yield "\"></script>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard_Psy/index.html.twig";
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
        return array (  256 => 183,  176 => 108,  152 => 90,  148 => 88,  142 => 86,  140 => 85,  133 => 81,  129 => 80,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <title>Dashboard Patient | PsyDesk</title>
    <!-- Favicon -->
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
    <!-- Google fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
    <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
    <!-- Bootstrap icons -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    <!-- Core theme CSS -->
    <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
    <style>
        /* Améliorations navbar */
        .navbar {
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            transition: all 0.2s;
        }
        .navbar-nav .nav-link {
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            border-radius: 40px;
            transition: 0.2s;
        }
        .navbar-nav .nav-link:hover {
            background: #f1f5f9;
            color: #667eea !important;
        }
        .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white !important;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8fafc;
            padding: 6px 14px;
            border-radius: 40px;
            margin-left: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #1e293b;
        }
        .user-info img {
            width: 28px;
            height: 28px;
            object-fit: cover;
            border-radius: 50%;
        }
        .user-info i {
            font-size: 1.2rem;
            color: #667eea;
        }
        @media (max-width: 991.98px) {
            .user-info {
                margin-left: 0;
                margin-top: 10px;
                justify-content: center;
            }
        }
    </style>
</head>
<body class=\"d-flex flex-column h-100\">
    <main class=\"flex-shrink-0\">
        <!-- Navigation avec image de profil uniquement ici -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
            <div class=\"container px-5\">
                <a class=\"navbar-brand\"><span class=\"fw-bolder text-primary\">PsyDesk</span></a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                    <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder align-items-center\">
                        <li class=\"nav-item\"><a class=\"nav-link active\" href=\"#\">Home</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_objectif_status_actifs') }}\"> consulter Objectifs</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                        <!-- Affichage de l'image (si existante) + nom -->
                        <li class=\"nav-item\">
                            <div class=\"user-info\">
                                {% if user.image %}
                                    <img src=\"{{ user.image }}\" alt=\"Avatar\" class=\"rounded-circle\">
                                {% else %}
                                    <i class=\"bi bi-person-circle\"></i>
                                {% endif %}
                                <span>{{ user.prenom ?? 'Utilisateur' }} {{ user.nom ?? '' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header (photo par défaut, pas d'image utilisateur) -->
        <header class=\"py-5\">
            <div class=\"container px-5 pb-5\">
                <div class=\"row gx-5 align-items-center\">
                    <div class=\"col-xxl-5\">
                        <div class=\"text-center text-xxl-start\">
                            <div class=\"badge bg-gradient-primary-to-secondary text-white mb-4\">
                                <div class=\"text-uppercase\">réclamations &middot; objectif &middot;</div>
                            </div>
                            <div class=\"fs-3 fw-light text-muted\">
                                Bienvenue <strong>{{ user.prenom ?? 'Invité' }} {{ user.nom ?? '' }}</strong>
                            </div>
                            <h1 class=\"display-3 fw-bolder mb-5\">
                                <span class=\"text-gradient d-inline\">faisons des réclamations</span>
                            </h1>
                        </div>
                    </div>
                    <div class=\"col-xxl-7\">
                        <div class=\"d-flex justify-content-center mt-5 mt-xxl-0\">
                            <div class=\"profile bg-gradient-primary-to-secondary\">
                                <!-- Image par défaut, pas de condition user.image -->
                                <img class=\"profile-img\" src=\"/profile.png\" alt=\"Photo de profil\" />
                                <!-- Dots SVG conservés -->
                                <div class=\"dots-1\">
                                    <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewBox=\"0 0 191.6 1215.4\" style=\"enable-background: new 0 0 191.6 1215.4\" xml:space=\"preserve\">
                                        <g transform=\"translate(0.000000,1280.000000) scale(0.100000,-0.100000)\">
                                            <path d=\"M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z\"></path>
                                            <path d=\"M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z\"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"dots-2\">
                                    <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewBox=\"0 0 191.6 1215.4\" style=\"enable-background: new 0 0 191.6 1215.4\" xml:space=\"preserve\">
                                        <g transform=\"translate(0.000000,1280.000000) scale(0.100000,-0.100000)\">
                                            <path d=\"M227.7,12788.6c-105-35-200-141-222-248c-43-206,163-412,369-369c155,32,275,190,260,339c-11,105-90,213-190,262        C383.7,12801.6,289.7,12808.6,227.7,12788.6z\"></path>
                                            <path d=\"M1507.7,12788.6c-151-50-253-216-222-362c25-119,136-230,254-255c194-41,395,142,375,339c-11,105-90,213-190,262        C1663.7,12801.6,1569.7,12808.6,1507.7,12788.6z\"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"dots-3\"></div>
                                <div class=\"dots-4\"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section (inchangée) -->
        <section class=\"bg-light py-5\">
            <div class=\"container px-5\">
                <div class=\"row gx-5 justify-content-center\">
                    <div class=\"col-xxl-8\">
                        <div class=\"text-center my-5\">
                            <h2 class=\"display-5 fw-bolder\"><span class=\"text-gradient d-inline\">À propos</span></h2>
                            <p class=\"lead fw-light mb-4\">Bienvenue sur votre espace patient</p>
                            <p class=\"text-muted\">Ici vous pouvez gérer vos objectifs, suivre vos réclamations et interagir avec votre psychologue.</p>
                            <div class=\"d-flex justify-content-center fs-2 gap-4\">
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-twitter\"></i></a>
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-linkedin\"></i></a>
                                <a class=\"text-gradient\" href=\"#!\"><i class=\"bi bi-github\"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class=\"bg-white py-4 mt-auto\">
        <div class=\"container px-5\">
            <div class=\"row align-items-center justify-content-between flex-column flex-sm-row\">
                <div class=\"col-auto\"><div class=\"small m-0\">Copyright &copy; PsyDesk 2025</div></div>
                <div class=\"col-auto\">
                    <a class=\"small\" href=\"#!\">Confidentialité</a>
                    <span class=\"mx-1\">&middot;</span>
                    <a class=\"small\" href=\"#!\">Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <script src=\"{{ asset('assets/js/scripts.js') }}\"></script>
</body>
</html>", "dashboard_Psy/index.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\dashboard_Psy\\index.html.twig");
    }
}
