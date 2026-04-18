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

/* notejour/index.html.twig */
class __TwigTemplate_f5dc242b3bf2c39a18fe635c3ffa2d94 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "notejour/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
        <meta name=\"description\" content=\"\" />
        <meta name=\"author\" content=\"\" />
        <title>Mes notes</title>
        <!-- Favicon-->
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
        <!-- Custom Google font-->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
        <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
        <!-- Bootstrap icons-->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"assets/css/styles.css\" rel=\"stylesheet\" />
    </head>
    <body class=\"d-flex flex-column h-100 bg-light\">
        <main class=\"flex-shrink-0\">
            <!-- Navigation-->
            <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
                <div class=\"container px-5\">
                    <a class=\"navbar-brand\" href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_patient_dashboard");
        yield "\"><span class=\"fw-bolder text-primary\">Mon Suivi</span></a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                        <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder\">
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_index");
        yield "\">Mes objectifs</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Notes Section (liste des notes sous forme de cartes) -->
            <section class=\"py-5\">
                <div class=\"container px-5 mb-5\">
                    <div class=\"text-center mb-5\">
                        <h1 class=\"display-5 fw-bolder mb-0\"><span class=\"text-gradient d-inline\">Mes notes</span></h1>
                    </div>
                    <div class=\"row gx-5 justify-content-center\">
                        <div class=\"col-lg-11 col-xl-9 col-xxl-8\">
                            ";
        // line 44
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["notejours"]) || array_key_exists("notejours", $context) ? $context["notejours"] : (function () { throw new RuntimeError('Variable "notejours" does not exist.', 44, $this->source); })()))) {
            // line 45
            yield "                                <div class=\"alert alert-info text-center\">Aucune note pour cet objectif.</div>
                            ";
        } else {
            // line 47
            yield "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notejours"]) || array_key_exists("notejours", $context) ? $context["notejours"] : (function () { throw new RuntimeError('Variable "notejours" does not exist.', 47, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 48
                yield "                                    <!-- Note Card -->
                                    <div class=\"card overflow-hidden shadow rounded-4 border-0 mb-5\">
                                        <div class=\"card-body p-0\">
                                            <div class=\"d-flex align-items-center\">
                                                <div class=\"p-5\">
                                                    <h2 class=\"fw-bolder\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["note"], "texteNote", [], "any", false, false, false, 53), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["note"], "texteNote", [], "any", false, false, false, 53)) > 50)) {
                    yield "...";
                }
                yield "</h2>
                                                    <p><strong>Date :</strong> ";
                // line 54
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "date", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "date", [], "any", false, false, false, 54), "Y-m-d"), "html", null, true)) : (""));
                yield "</p>
                                                    <p><strong>Objectif achevé :</strong> ";
                // line 55
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "evaluation", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Oui") : ("Non"));
                yield "</p>
                                                    <p><strong>Satisfaction :</strong> ";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "satisfer", [], "any", false, false, false, 56), "html", null, true);
                yield "/10</p>
                                                    <p><strong>Créé le :</strong> ";
                // line 57
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["note"], "createdAt", [], "any", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["note"], "createdAt", [], "any", false, false, false, 57), "Y-m-d H:i:s"), "html", null, true)) : (""));
                yield "</p>
                                                    <div class=\"mt-3\">
                                                        <a href=\"";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notejour_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["note"], "id", [], "any", false, false, false, 59)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-secondary me-2\">Modifier</a>
                                                        <!-- Formulaire de suppression -->
                                                        <form method=\"post\" action=\"";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_notejour_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["note"], "id", [], "any", false, false, false, 61)]), "html", null, true);
                yield "\" style=\"display: inline-block\">
                                                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["note"], "id", [], "any", false, false, false, 62))), "html", null, true);
                yield "\">
                                                            <button class=\"btn btn-sm btn-outline-danger\" onclick=\"return confirm('Supprimer cette note ?')\">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                    
                                            </div>
                                        </div>
                                    </div>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['note'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "                            ";
        }
        // line 73
        yield "                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to action section (facultative) -->
            <section class=\"py-5 bg-gradient-primary-to-secondary text-white\">
                <div class=\"container px-5 my-5\">
                    <div class=\"text-center\">
                        <h2 class=\"display-4 fw-bolder mb-4\">Suivez vos progrès</h2>
                        <a class=\"btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder\" href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_index");
        yield "\">Retour aux objectifs</a>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer-->
        <footer class=\"bg-white py-4 mt-auto\">
            <div class=\"container px-5\">
                <div class=\"row align-items-center justify-content-between flex-column flex-sm-row\">
                    <div class=\"col-auto\"><div class=\"small m-0\">Copyright &copy; Votre Application 2025</div></div>
                    <div class=\"col-auto\">
                        <a class=\"small\" href=\"#!\">Confidentialité</a>
                        <span class=\"mx-1\">&middot;</span>
                        <a class=\"small\" href=\"#!\">Conditions</a>
                        <span class=\"mx-1\">&middot;</span>
                        <a class=\"small\" href=\"#!\">Contact</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS-->
            <script src=\"";
        // line 108
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
        return "notejour/index.html.twig";
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
        return array (  212 => 108,  184 => 83,  172 => 73,  169 => 72,  153 => 62,  149 => 61,  144 => 59,  139 => 57,  135 => 56,  131 => 55,  127 => 54,  120 => 53,  113 => 48,  108 => 47,  104 => 45,  102 => 44,  85 => 30,  81 => 29,  74 => 25,  48 => 1,);
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
        <title>Mes notes</title>
        <!-- Favicon-->
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
        <!-- Custom Google font-->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
        <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
        <!-- Bootstrap icons-->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"assets/css/styles.css\" rel=\"stylesheet\" />
    </head>
    <body class=\"d-flex flex-column h-100 bg-light\">
        <main class=\"flex-shrink-0\">
            <!-- Navigation-->
            <nav class=\"navbar navbar-expand-lg navbar-light bg-white py-3\">
                <div class=\"container px-5\">
                    <a class=\"navbar-brand\" href=\"{{ path('app_patient_dashboard') }}\"><span class=\"fw-bolder text-primary\">Mon Suivi</span></a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                        <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder\">
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_objectif_index') }}\">Mes objectifs</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Notes Section (liste des notes sous forme de cartes) -->
            <section class=\"py-5\">
                <div class=\"container px-5 mb-5\">
                    <div class=\"text-center mb-5\">
                        <h1 class=\"display-5 fw-bolder mb-0\"><span class=\"text-gradient d-inline\">Mes notes</span></h1>
                    </div>
                    <div class=\"row gx-5 justify-content-center\">
                        <div class=\"col-lg-11 col-xl-9 col-xxl-8\">
                            {% if notejours is empty %}
                                <div class=\"alert alert-info text-center\">Aucune note pour cet objectif.</div>
                            {% else %}
                                {% for note in notejours %}
                                    <!-- Note Card -->
                                    <div class=\"card overflow-hidden shadow rounded-4 border-0 mb-5\">
                                        <div class=\"card-body p-0\">
                                            <div class=\"d-flex align-items-center\">
                                                <div class=\"p-5\">
                                                    <h2 class=\"fw-bolder\">{{ note.texteNote|slice(0, 50) }}{% if note.texteNote|length > 50 %}...{% endif %}</h2>
                                                    <p><strong>Date :</strong> {{ note.date ? note.date|date('Y-m-d') : '' }}</p>
                                                    <p><strong>Objectif achevé :</strong> {{ note.evaluation ? 'Oui' : 'Non' }}</p>
                                                    <p><strong>Satisfaction :</strong> {{ note.satisfer }}/10</p>
                                                    <p><strong>Créé le :</strong> {{ note.createdAt ? note.createdAt|date('Y-m-d H:i:s') : '' }}</p>
                                                    <div class=\"mt-3\">
                                                        <a href=\"{{ path('app_notejour_edit', {'id': note.id}) }}\" class=\"btn btn-sm btn-outline-secondary me-2\">Modifier</a>
                                                        <!-- Formulaire de suppression -->
                                                        <form method=\"post\" action=\"{{ path('app_notejour_delete', {'id': note.id}) }}\" style=\"display: inline-block\">
                                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ note.id) }}\">
                                                            <button class=\"btn btn-sm btn-outline-danger\" onclick=\"return confirm('Supprimer cette note ?')\">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                    
                                            </div>
                                        </div>
                                    </div>
                                {% endfor %}
                            {% endif %}
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to action section (facultative) -->
            <section class=\"py-5 bg-gradient-primary-to-secondary text-white\">
                <div class=\"container px-5 my-5\">
                    <div class=\"text-center\">
                        <h2 class=\"display-4 fw-bolder mb-4\">Suivez vos progrès</h2>
                        <a class=\"btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder\" href=\"{{ path('app_objectif_index') }}\">Retour aux objectifs</a>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer-->
        <footer class=\"bg-white py-4 mt-auto\">
            <div class=\"container px-5\">
                <div class=\"row align-items-center justify-content-between flex-column flex-sm-row\">
                    <div class=\"col-auto\"><div class=\"small m-0\">Copyright &copy; Votre Application 2025</div></div>
                    <div class=\"col-auto\">
                        <a class=\"small\" href=\"#!\">Confidentialité</a>
                        <span class=\"mx-1\">&middot;</span>
                        <a class=\"small\" href=\"#!\">Conditions</a>
                        <span class=\"mx-1\">&middot;</span>
                        <a class=\"small\" href=\"#!\">Contact</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS-->
            <script src=\"{{ asset('assets/js/scripts.js') }}\"></script>
    </body>
</html>", "notejour/index.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\notejour\\index.html.twig");
    }
}
