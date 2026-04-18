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

/* dashboard_p/9dim.html.twig */
class __TwigTemplate_4c67ed335aa71c3ee4574b8379e8ac8b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard_p/9dim.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard_p/9dim.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
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
</head>
<body class=\"d-flex flex-column h-100\">
    <main class=\"flex-shrink-0\">
        <!-- Navigation -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
            <div class=\"container px-5\">
                <a class=\"navbar-brand\"><span class=\"fw-bolder text-primary\">PsyDesk</span></a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                    <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder\">
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Home</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_index");
        yield "\">Mes Objectifs</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_index");
        yield "\">Mes réclamations</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a></li>
                        ";
        // line 36
        yield "                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class=\"py-5\">
            <div class=\"container px-5 pb-5\">
                <div class=\"row gx-5 align-items-center\">
                    <div class=\"col-xxl-5\">
                        <div class=\"text-center text-xxl-start\">
                            <div class=\"badge bg-gradient-primary-to-secondary text-white mb-4\">
                                <div class=\"text-uppercase\">réclamations &middot; objectif &middot;</div>
                            </div>
                            <div class=\"fs-3 fw-light text-muted\">
                                je suis ton ami <strong>";
        // line 51
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "prenom", [], "any", true, true, false, 51) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "prenom", [], "any", false, false, false, 51)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "prenom", [], "any", false, false, false, 51), "html", null, true)) : ("Invité"));
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "nom", [], "any", true, true, false, 51) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "nom", [], "any", false, false, false, 51)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "nom", [], "any", false, false, false, 51), "html", null, true)) : (""));
        yield "</strong>
                            </div>
                            <h1 class=\"display-3 fw-bolder mb-5\">
                                <span class=\"text-gradient d-inline\">faisons des réclamations</span>
                            </h1>
                            <div class=\"d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3\">
                                ";
        // line 58
        yield "                            </div>
                        </div>
                    </div>
                    <div class=\"col-xxl-7\">
                        <div class=\"d-flex justify-content-center mt-5 mt-xxl-0\">
                            <div class=\"profile bg-gradient-primary-to-secondary\">
                                <img class=\"profile-img\" src=\"/profile.png\" alt=\"Photo de profil\" />
                                <!-- Dots SVG (conservés) -->
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

        <!-- About Section (optionnelle, tu peux la garder ou la supprimer) -->
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
        <!-- Core theme JS -->
    <script src=\"";
        // line 129
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
        return "dashboard_p/9dim.html.twig";
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
        return array (  194 => 129,  121 => 58,  110 => 51,  93 => 36,  89 => 34,  85 => 33,  81 => 32,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
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
</head>
<body class=\"d-flex flex-column h-100\">
    <main class=\"flex-shrink-0\">
        <!-- Navigation -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
            <div class=\"container px-5\">
                <a class=\"navbar-brand\"><span class=\"fw-bolder text-primary\">PsyDesk</span></a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                    <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder\">
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Home</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_objectif_index') }}\">Mes Objectifs</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_reclamation_index') }}\">Mes réclamations</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                        {# Lien Contact supprimé #}
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class=\"py-5\">
            <div class=\"container px-5 pb-5\">
                <div class=\"row gx-5 align-items-center\">
                    <div class=\"col-xxl-5\">
                        <div class=\"text-center text-xxl-start\">
                            <div class=\"badge bg-gradient-primary-to-secondary text-white mb-4\">
                                <div class=\"text-uppercase\">réclamations &middot; objectif &middot;</div>
                            </div>
                            <div class=\"fs-3 fw-light text-muted\">
                                je suis ton ami <strong>{{ user.prenom ?? 'Invité' }} {{ user.nom ?? '' }}</strong>
                            </div>
                            <h1 class=\"display-3 fw-bolder mb-5\">
                                <span class=\"text-gradient d-inline\">faisons des réclamations</span>
                            </h1>
                            <div class=\"d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3\">
                                {# Tu peux ajouter des boutons ici si besoin #}
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xxl-7\">
                        <div class=\"d-flex justify-content-center mt-5 mt-xxl-0\">
                            <div class=\"profile bg-gradient-primary-to-secondary\">
                                <img class=\"profile-img\" src=\"/profile.png\" alt=\"Photo de profil\" />
                                <!-- Dots SVG (conservés) -->
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

        <!-- About Section (optionnelle, tu peux la garder ou la supprimer) -->
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
        <!-- Core theme JS -->
    <script src=\"{{ asset('assets/js/scripts.js') }}\"></script>
</body>
</html>", "dashboard_p/9dim.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\dashboard_p\\9dim.html.twig");
    }
}
