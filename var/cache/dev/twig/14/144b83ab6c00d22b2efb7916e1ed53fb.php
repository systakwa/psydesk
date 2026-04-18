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

/* objectif/status_actifs.html.twig */
class __TwigTemplate_ff68d071a490401caae2d7f8b98ceec6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "objectif/status_actifs.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "objectif/status_actifs.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
        <meta name=\"description\" content=\"\" />
        <meta name=\"author\" content=\"\" />
        <title>Objectifs actifs</title>
        <!-- Favicon-->
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
        <!-- Custom Google font-->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
        <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
        <!-- Bootstrap icons-->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
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
                            <li class=\"nav-item\"><a class=\"nav-link active\" href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_status_actifs");
        yield "\">Objectifs actifs</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Projects Section (liste des objectifs actifs) -->
            <section class=\"py-5\">
                <div class=\"container px-5 mb-5\">
                    <div class=\"text-center mb-5\">
                        <h1 class=\"display-5 fw-bolder mb-0\"><span class=\"text-gradient d-inline\">Objectifs actifs</span></h1>
                    </div>
                    <div class=\"row gx-5 justify-content-center\">
                        <div class=\"col-lg-11 col-xl-9 col-xxl-8\">
                            ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["objectifs"]) || array_key_exists("objectifs", $context) ? $context["objectifs"] : (function () { throw new RuntimeError('Variable "objectifs" does not exist.', 44, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["objectif"]) {
            // line 45
            yield "                                <!-- Project Card -->
                                <div class=\"card overflow-hidden shadow rounded-4 border-0 mb-5\">
                                    <div class=\"card-body p-0\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"p-5 flex-grow-1\">
                                                <h2 class=\"fw-bolder\">";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "description", [], "any", false, false, false, 50), "html", null, true);
            yield "</h2>
                                                <p><strong>Date de fin :</strong> ";
            // line 51
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "datefin", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "datefin", [], "any", false, false, false, 51), "Y-m-d"), "html", null, true)) : ("Non définie"));
            yield "</p>
                                                <p><strong>Statut :</strong> <span class=\"badge bg-success\">Actif</span></p>
                                                <p><strong>Notes :</strong> ";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "nbNote", [], "any", false, false, false, 53), "html", null, true);
            yield "</p>
                                                <p><strong>Jours :</strong> ";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "nbJour", [], "any", false, false, false, 54), "html", null, true);
            yield "</p>
                                                <p><strong>Créé le :</strong> ";
            // line 55
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "createdAt", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "createdAt", [], "any", false, false, false, 55), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</p>
                                                <p><strong>État :</strong> ";
            // line 56
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "etat", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Validé") : ("Non validé"));
            yield "</p>
                                                <div class=\"mt-3\">
                                                    <a href=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "id", [], "any", false, false, false, 58)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-outline-primary me-2\">Voir</a>

                                                    <a href=\"#\" class=\"btn btn-sm btn-outline-warning me-2 view-analysis-btn\" data-objectif-id=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "id", [], "any", false, false, false, 60), "html", null, true);
            yield "\" data-evaluate-url=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_objectif_evaluate", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "id", [], "any", false, false, false, 60)]), "html", null, true);
            yield "\">Voir analyse</a>
                                                    <a href=\"";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_note_psy", ["objectif_id" => CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "id", [], "any", false, false, false, 61)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-outline-info\">Voir note</a>
                                                </div>
                                            </div>
                                            <div class=\"p-3 text-center\">
                                                <div class=\"small text-muted mb-2\">QR de l'objectif</div>
                                                ";
            // line 67
            yield "                                                ";
            $context["qrText"] = "";
            // line 68
            yield "                                                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["objectif"], "notejours", [], "any", false, false, false, 68));
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 69
                yield "                                                    ";
                $context["qrText"] = ((((isset($context["qrText"]) || array_key_exists("qrText", $context) ? $context["qrText"] : (function () { throw new RuntimeError('Variable "qrText" does not exist.', 69, $this->source); })()) . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["n"], "date", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["n"], "date", [], "any", false, false, false, 69), "Y-m-d") . ": ")) : (""))) . Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["n"], "texteNote", [], "any", false, false, false, 69))) . "
");
                // line 70
                yield "                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['n'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            yield "                                                ";
            $context["qrText"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["qrText"]) || array_key_exists("qrText", $context) ? $context["qrText"] : (function () { throw new RuntimeError('Variable "qrText" does not exist.', 71, $this->source); })()), 0, 800);
            // line 72
            yield "                                                ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["qrText"]) || array_key_exists("qrText", $context) ? $context["qrText"] : (function () { throw new RuntimeError('Variable "qrText" does not exist.', 72, $this->source); })())) > 0)) {
                // line 73
                yield "                                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . Twig\Extension\CoreExtension::urlencode((isset($context["qrText"]) || array_key_exists("qrText", $context) ? $context["qrText"] : (function () { throw new RuntimeError('Variable "qrText" does not exist.', 73, $this->source); })()))), "html", null, true);
                yield "\" alt=\"QR code\" style=\"width:140px;height:140px;border:1px solid #eee;border-radius:6px;\" />
                                                ";
            } else {
                // line 75
                yield "                                                    <div class=\"text-muted small\">Pas de notes</div>
                                                ";
            }
            // line 77
            yield "                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
            $context['_iterated'] = true;
        }
        // line 81
        if (!$context['_iterated']) {
            // line 82
            yield "                                <div class=\"alert alert-info text-center\">Aucun objectif actif trouvé.</div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['objectif'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        yield "                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to action section (sans création d'objectif, uniquement un retour) -->
            <section class=\"py-5 bg-gradient-primary-to-secondary text-white\">
                <div class=\"container px-5 my-5\">
                    <div class=\"text-center\">
                        <h2 class=\"display-4 fw-bolder mb-4\">Besoin de plus d'objectifs ?</h2>
                        <a class=\"btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder\" href=\"";
        // line 94
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_objectif_index");
        yield "\">Voir tous mes objectifs</a>
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

        <!-- Bootstrap core JS -->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS -->
        <script src=\"";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/scripts.js"), "html", null, true);
        yield "\"></script>
        <!-- Analyse modal -->
        <div class=\"modal fade\" id=\"analyseModal\" tabindex=\"-1\" aria-labelledby=\"analyseModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-lg\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"analyseModalLabel\">Analyse de l'objectif</h5>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body\" id=\"analyse-modal-body\">
                        <div class=\"text-center\">
                            <div class=\"spinner-border text-primary\" role=\"status\">
                                <span class=\"visually-hidden\">Chargement...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const analyseButtons = document.querySelectorAll('.view-analysis-btn');
                analyseButtons.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const objectifId = this.dataset.objectifId;
                        const url = this.dataset.evaluateUrl || null;
                        const modalBody = document.getElementById('analyse-modal-body');
                        const modalEl = document.getElementById('analyseModal');
                        const modal = new bootstrap.Modal(modalEl);

                        modalBody.innerHTML = '<div class=\"text-center\"><div class=\"spinner-border text-primary\" role=\"status\"><span class=\"visually-hidden\">Chargement...</span></div></div>';

                        const fetchUrl = url ? (url + '?json=1') : (`/api/objectifs/\${objectifId}/evaluate?json=1`);
                        console.log('Fetching analysis from', fetchUrl);

                        fetch(fetchUrl)
                            .then(resp => {
                                console.log('Fetch response', resp.status);
                                if (!resp.ok) throw new Error('HTTP ' + resp.status);
                                return resp.json();
                            })
                            .then(data => {
                                if (data.error) {
                                    modalBody.innerHTML = `<div class=\"alert alert-danger\">Erreur: \${data.error}</div>`;
                                    return;
                                }
                                let html = `<h5>\${data.summary ?? 'Analyse'}</h5>`;
                                html += `<p><strong>Moyenne:</strong> \${data.average ?? 'N/A'} (\${data.count ?? 0} notes)</p>`;
                                html += `<p><strong>Interprétation:</strong> \${data.description ?? ''}</p>`;
                                html += `<p><strong>Statut:</strong> \${data.status ? 'Probablement réussi' : 'Probablement non atteint'}</p>`;
                                if (data.recommendations && Array.isArray(data.recommendations)) {
                                    html += '<h6>Recommandations</h6><ul>' + data.recommendations.map(r => `<li>\${r}</li>`).join('') + '</ul>';
                                }
                                if (data.ai) {
                                    html += '<h6>Analyse IA</h6>';
                                    html += `<pre style=\"white-space:pre-wrap;\">\${JSON.stringify(data.ai, null, 2)}</pre>`;
                                }
                                modalBody.innerHTML = html;
                            })
                            .catch(err => {
                                console.error('Fetch error', err);
                                modalBody.innerHTML = `<div class=\"alert alert-danger\">Erreur réseau: \${err.message}</div>`;
                            });

                        modal.show();
                    });
                });
            });
        </script>
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
        return "objectif/status_actifs.html.twig";
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
        return array (  250 => 119,  222 => 94,  210 => 84,  203 => 82,  201 => 81,  193 => 77,  189 => 75,  183 => 73,  180 => 72,  177 => 71,  171 => 70,  167 => 69,  162 => 68,  159 => 67,  151 => 61,  145 => 60,  140 => 58,  135 => 56,  131 => 55,  127 => 54,  123 => 53,  118 => 51,  114 => 50,  107 => 45,  102 => 44,  85 => 30,  81 => 29,  74 => 25,  48 => 1,);
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
        <title>Objectifs actifs</title>
        <!-- Favicon-->
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
        <!-- Custom Google font-->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
        <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap\" rel=\"stylesheet\" />
        <!-- Bootstrap icons-->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css\" rel=\"stylesheet\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"/assets/css/styles.css\" rel=\"stylesheet\" />
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
                            <li class=\"nav-item\"><a class=\"nav-link active\" href=\"{{ path('app_objectif_status_actifs') }}\">Objectifs actifs</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Projects Section (liste des objectifs actifs) -->
            <section class=\"py-5\">
                <div class=\"container px-5 mb-5\">
                    <div class=\"text-center mb-5\">
                        <h1 class=\"display-5 fw-bolder mb-0\"><span class=\"text-gradient d-inline\">Objectifs actifs</span></h1>
                    </div>
                    <div class=\"row gx-5 justify-content-center\">
                        <div class=\"col-lg-11 col-xl-9 col-xxl-8\">
                            {% for objectif in objectifs %}
                                <!-- Project Card -->
                                <div class=\"card overflow-hidden shadow rounded-4 border-0 mb-5\">
                                    <div class=\"card-body p-0\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"p-5 flex-grow-1\">
                                                <h2 class=\"fw-bolder\">{{ objectif.description }}</h2>
                                                <p><strong>Date de fin :</strong> {{ objectif.datefin ? objectif.datefin|date('Y-m-d') : 'Non définie' }}</p>
                                                <p><strong>Statut :</strong> <span class=\"badge bg-success\">Actif</span></p>
                                                <p><strong>Notes :</strong> {{ objectif.nbNote }}</p>
                                                <p><strong>Jours :</strong> {{ objectif.nbJour }}</p>
                                                <p><strong>Créé le :</strong> {{ objectif.createdAt ? objectif.createdAt|date('Y-m-d H:i:s') : '' }}</p>
                                                <p><strong>État :</strong> {{ objectif.etat ? 'Validé' : 'Non validé' }}</p>
                                                <div class=\"mt-3\">
                                                    <a href=\"{{ path('app_objectif_show', {'id': objectif.id}) }}\" class=\"btn btn-sm btn-outline-primary me-2\">Voir</a>

                                                    <a href=\"#\" class=\"btn btn-sm btn-outline-warning me-2 view-analysis-btn\" data-objectif-id=\"{{ objectif.id }}\" data-evaluate-url=\"{{ path('api_objectif_evaluate', {'id': objectif.id}) }}\">Voir analyse</a>
                                                    <a href=\"{{ path('app_note_psy', {'objectif_id': objectif.id}) }}\" class=\"btn btn-sm btn-outline-info\">Voir note</a>
                                                </div>
                                            </div>
                                            <div class=\"p-3 text-center\">
                                                <div class=\"small text-muted mb-2\">QR de l'objectif</div>
                                                {# Build a short text summary of notes and URL-encode it for the QR #}
                                                {% set qrText = '' %}
                                                {% for n in objectif.notejours %}
                                                    {% set qrText = qrText ~ (n.date ? (n.date|date('Y-m-d') ~ ': ') : '') ~ (n.texteNote|striptags) ~ '\\n' %}
                                                {% endfor %}
                                                {% set qrText = qrText|slice(0,800) %}
                                                {% if qrText|length > 0 %}
                                                    <img src=\"{{ 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' ~ (qrText|url_encode) }}\" alt=\"QR code\" style=\"width:140px;height:140px;border:1px solid #eee;border-radius:6px;\" />
                                                {% else %}
                                                    <div class=\"text-muted small\">Pas de notes</div>
                                                {% endif %}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {% else %}
                                <div class=\"alert alert-info text-center\">Aucun objectif actif trouvé.</div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to action section (sans création d'objectif, uniquement un retour) -->
            <section class=\"py-5 bg-gradient-primary-to-secondary text-white\">
                <div class=\"container px-5 my-5\">
                    <div class=\"text-center\">
                        <h2 class=\"display-4 fw-bolder mb-4\">Besoin de plus d'objectifs ?</h2>
                        <a class=\"btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder\" href=\"{{ path('app_objectif_index') }}\">Voir tous mes objectifs</a>
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

        <!-- Bootstrap core JS -->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS -->
        <script src=\"{{ asset('assets/js/scripts.js') }}\"></script>
        <!-- Analyse modal -->
        <div class=\"modal fade\" id=\"analyseModal\" tabindex=\"-1\" aria-labelledby=\"analyseModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-lg\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"analyseModalLabel\">Analyse de l'objectif</h5>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body\" id=\"analyse-modal-body\">
                        <div class=\"text-center\">
                            <div class=\"spinner-border text-primary\" role=\"status\">
                                <span class=\"visually-hidden\">Chargement...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const analyseButtons = document.querySelectorAll('.view-analysis-btn');
                analyseButtons.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const objectifId = this.dataset.objectifId;
                        const url = this.dataset.evaluateUrl || null;
                        const modalBody = document.getElementById('analyse-modal-body');
                        const modalEl = document.getElementById('analyseModal');
                        const modal = new bootstrap.Modal(modalEl);

                        modalBody.innerHTML = '<div class=\"text-center\"><div class=\"spinner-border text-primary\" role=\"status\"><span class=\"visually-hidden\">Chargement...</span></div></div>';

                        const fetchUrl = url ? (url + '?json=1') : (`/api/objectifs/\${objectifId}/evaluate?json=1`);
                        console.log('Fetching analysis from', fetchUrl);

                        fetch(fetchUrl)
                            .then(resp => {
                                console.log('Fetch response', resp.status);
                                if (!resp.ok) throw new Error('HTTP ' + resp.status);
                                return resp.json();
                            })
                            .then(data => {
                                if (data.error) {
                                    modalBody.innerHTML = `<div class=\"alert alert-danger\">Erreur: \${data.error}</div>`;
                                    return;
                                }
                                let html = `<h5>\${data.summary ?? 'Analyse'}</h5>`;
                                html += `<p><strong>Moyenne:</strong> \${data.average ?? 'N/A'} (\${data.count ?? 0} notes)</p>`;
                                html += `<p><strong>Interprétation:</strong> \${data.description ?? ''}</p>`;
                                html += `<p><strong>Statut:</strong> \${data.status ? 'Probablement réussi' : 'Probablement non atteint'}</p>`;
                                if (data.recommendations && Array.isArray(data.recommendations)) {
                                    html += '<h6>Recommandations</h6><ul>' + data.recommendations.map(r => `<li>\${r}</li>`).join('') + '</ul>';
                                }
                                if (data.ai) {
                                    html += '<h6>Analyse IA</h6>';
                                    html += `<pre style=\"white-space:pre-wrap;\">\${JSON.stringify(data.ai, null, 2)}</pre>`;
                                }
                                modalBody.innerHTML = html;
                            })
                            .catch(err => {
                                console.error('Fetch error', err);
                                modalBody.innerHTML = `<div class=\"alert alert-danger\">Erreur réseau: \${err.message}</div>`;
                            });

                        modal.show();
                    });
                });
            });
        </script>
    </body>
</html>", "objectif/status_actifs.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\objectif\\status_actifs.html.twig");
    }
}
