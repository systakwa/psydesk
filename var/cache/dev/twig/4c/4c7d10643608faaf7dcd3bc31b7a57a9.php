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

/* Objectif_reclamtion_back/rec9dim.html.twig */
class __TwigTemplate_73af1f37471cba96e93632d5496cff92 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Objectif_reclamtion_back/rec9dim.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Objectif_reclamtion_back/rec9dim.html.twig"));

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

        yield "PsyDesk Admin - Réclamations";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/dashboard/Group126@2x.png"), "html", null, true);
        yield "\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Gestion des réclamations</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Consultez et gérez toutes les réclamations des patients.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques (optionnelles) -->
    <div class=\"row\">
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$12.34</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+3.5%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Potential growth</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$17.34</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+11%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Revenue current</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$12.34</h3>
                                <p class=\"text-danger ml-2 mb-0 font-weight-medium\">-2.4%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-danger\">
                                <span class=\"mdi mdi-arrow-bottom-left icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Daily Income</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$31.53</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+3.5%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Expense current</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des réclamations -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <h4 class=\"card-title\">Liste des réclamations</h4>
                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Email patient</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 129
        if ((array_key_exists("reclamations", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reclamations"]) || array_key_exists("reclamations", $context) ? $context["reclamations"] : (function () { throw new RuntimeError('Variable "reclamations" does not exist.', 129, $this->source); })())) > 0))) {
            // line 130
            yield "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reclamations"]) || array_key_exists("reclamations", $context) ? $context["reclamations"] : (function () { throw new RuntimeError('Variable "reclamations" does not exist.', 130, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["reclamation"]) {
                // line 131
                yield "                                        ";
                $context["estTraite"] = ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "reponse", [], "any", false, false, false, 131)) && (CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "reponse", [], "any", false, false, false, 131) != ""));
                // line 132
                yield "                                        <tr class=\"";
                if ((($tmp = (isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 132, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "table-success";
                } else {
                    yield "table-danger";
                }
                yield "\">
                                            <td>";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 133), "html", null, true);
                yield "</td>
                                            <td>";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 134), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 134)) > 80)) {
                    yield "...";
                }
                yield "</td>
                                            <td>";
                // line 135
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "date", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "date", [], "any", false, false, false, 135), "Y-m-d"), "html", null, true)) : (""));
                yield "</td>
                                            <td>";
                // line 136
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 136), "nom", [], "any", false, false, false, 136), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 136), "prenom", [], "any", false, false, false, 136), "html", null, true);
                yield "</td>
                                            <td>";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 137), "email", [], "any", false, false, false, 137), "html", null, true);
                yield "</td>
                                            <td>
                                                ";
                // line 139
                if ((($tmp = (isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 139, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 140
                    yield "                                                    <span class=\"badge bg-success\">Traité</span>
                                                ";
                } else {
                    // line 142
                    yield "                                                    <span class=\"badge bg-danger\">Non traité</span>
                                                ";
                }
                // line 144
                yield "                                            </td>
                                            <td>
                                                ";
                // line 146
                if ((($tmp =  !(isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 146, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 147
                    yield "                                                    <button type=\"button\" class=\"btn btn-sm btn-primary btn-traiter\"
                                                            data-id=\"";
                    // line 148
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 148), "html", null, true);
                    yield "\"
                                                            data-description=\"";
                    // line 149
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 149), "html_attr");
                    yield "\"
                                                            data-url=\"";
                    // line 150
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_repondre", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 150)]), "html", null, true);
                    yield "\">
                                                        <i class=\"mdi mdi-reply\"></i> Traiter
                                                    </button>
                                                ";
                } else {
                    // line 154
                    yield "                                                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 154)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"mdi mdi-eye\"></i> Voir réponse
                                                    </a>
                                                ";
                }
                // line 158
                yield "                                                <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 158)]), "html", null, true);
                yield "\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement cette réclamation ?');\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 159
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 159))), "html", null, true);
                yield "\">
                                                    <button class=\"btn btn-sm btn-danger\">
                                                        <i class=\"mdi mdi-delete\"></i> Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['reclamation'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 167
            yield "                                ";
        } else {
            // line 168
            yield "                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">Aucune réclamation trouvée.</td>
                                    </tr>
                                ";
        }
        // line 172
        yield "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 181
        yield "    <div class=\"modal fade\" id=\"repondreGlobalModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">Répondre à la réclamation #<span id=\"reclamationIdSpan\"></span></h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form id=\"globalRepondreForm\" data-url=\"\">
                    <div class=\"modal-body\">
                        <div class=\"mb-3\">
                            <label for=\"reclamationDescription\" class=\"form-label\">Description de la réclamation</label>
                            <textarea id=\"reclamationDescription\" class=\"form-control\" rows=\"3\" readonly></textarea>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"reponseGlobal\" class=\"form-label\">Votre réponse</label>
                            <textarea id=\"reponseGlobal\" name=\"reponse\" class=\"form-control\" rows=\"4\" required></textarea>
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Envoyer la réponse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 209
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

        // line 210
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gérer le clic sur chaque bouton \"Traiter\"
            document.querySelectorAll('.btn-traiter').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const description = this.dataset.description;
                    const url = this.dataset.url;

                    // Remplir les champs de la modale
                    document.getElementById('reclamationIdSpan').innerText = id;
                    document.getElementById('reclamationDescription').value = description;
                    document.getElementById('reponseGlobal').value = '';
                    const form = document.getElementById('globalRepondreForm');
                    form.dataset.url = url;

                    // Ouvrir la modale Bootstrap 5
                    const modal = new bootstrap.Modal(document.getElementById('repondreGlobalModal'));
                    modal.show();
                });
            });

            // Soumission du formulaire de réponse en AJAX
            const form = document.getElementById('globalRepondreForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const url = this.dataset.url;
                const reponse = document.getElementById('reponseGlobal').value.trim();

                if (!reponse) {
                    alert('Veuillez entrer une réponse.');
                    return;
                }

                const formData = new FormData();
                formData.append('reponse', reponse);

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('repondreGlobalModal'));
                        modal.hide();
                        location.reload();
                    } else {
                        alert('Erreur : ' + (data.error || 'La réponse est vide'));
                    }
                })
                .catch(() => alert('Une erreur est survenue lors de l\\'envoi.'));
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
        return "Objectif_reclamtion_back/rec9dim.html.twig";
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
        return array (  403 => 210,  390 => 209,  353 => 181,  343 => 172,  337 => 168,  334 => 167,  320 => 159,  315 => 158,  307 => 154,  300 => 150,  296 => 149,  292 => 148,  289 => 147,  287 => 146,  283 => 144,  279 => 142,  275 => 140,  273 => 139,  268 => 137,  262 => 136,  258 => 135,  251 => 134,  247 => 133,  238 => 132,  235 => 131,  230 => 130,  228 => 129,  109 => 13,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/Objectif_reclamtion_back/reclamation.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}PsyDesk Admin - Réclamations{% endblock %}

{% block content %}
    <div class=\"row\">
        <div class=\"col-12 grid-margin stretch-card\">
            <div class=\"card corona-gradient-card\">
                <div class=\"card-body py-0 px-0 px-sm-3\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-4 col-sm-3 col-xl-2\">
                            <img src=\"{{ asset('assets/images/dashboard/Group126@2x.png') }}\" class=\"gradient-corona-img img-fluid\" alt=\"\">
                        </div>
                        <div class=\"col-5 col-sm-7 col-xl-8 p-0\">
                            <h4 class=\"mb-1 mb-sm-0\">Gestion des réclamations</h4>
                            <p class=\"mb-0 font-weight-normal d-none d-sm-block\">Consultez et gérez toutes les réclamations des patients.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes statistiques (optionnelles) -->
    <div class=\"row\">
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$12.34</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+3.5%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Potential growth</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$17.34</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+11%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Revenue current</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$12.34</h3>
                                <p class=\"text-danger ml-2 mb-0 font-weight-medium\">-2.4%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-danger\">
                                <span class=\"mdi mdi-arrow-bottom-left icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Daily Income</h6>
                </div>
            </div>
        </div>
        <div class=\"col-xl-3 col-sm-6 grid-margin stretch-card\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-9\">
                            <div class=\"d-flex align-items-center align-self-start\">
                                <h3 class=\"mb-0\">\$31.53</h3>
                                <p class=\"text-success ml-2 mb-0 font-weight-medium\">+3.5%</p>
                            </div>
                        </div>
                        <div class=\"col-3\">
                            <div class=\"icon icon-box-success\">
                                <span class=\"mdi mdi-arrow-top-right icon-item\"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class=\"text-muted font-weight-normal\">Expense current</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des réclamations -->
    <div class=\"row\">
        <div class=\"col-12 grid-margin\">
            <div class=\"card\">
                <div class=\"card-body\">
                    <h4 class=\"card-title\">Liste des réclamations</h4>
                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Email patient</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% if reclamations is defined and reclamations|length > 0 %}
                                    {% for reclamation in reclamations %}
                                        {% set estTraite = reclamation.reponse is not null and reclamation.reponse != '' %}
                                        <tr class=\"{% if estTraite %}table-success{% else %}table-danger{% endif %}\">
                                            <td>{{ reclamation.id }}</td>
                                            <td>{{ reclamation.description|slice(0, 80) }}{% if reclamation.description|length > 80 %}...{% endif %}</td>
                                            <td>{{ reclamation.date ? reclamation.date|date('Y-m-d') : '' }}</td>
                                            <td>{{ reclamation.idPatient.nom }} {{ reclamation.idPatient.prenom }}</td>
                                            <td>{{ reclamation.idPatient.email }}</td>
                                            <td>
                                                {% if estTraite %}
                                                    <span class=\"badge bg-success\">Traité</span>
                                                {% else %}
                                                    <span class=\"badge bg-danger\">Non traité</span>
                                                {% endif %}
                                            </td>
                                            <td>
                                                {% if not estTraite %}
                                                    <button type=\"button\" class=\"btn btn-sm btn-primary btn-traiter\"
                                                            data-id=\"{{ reclamation.id }}\"
                                                            data-description=\"{{ reclamation.description|escape('html_attr') }}\"
                                                            data-url=\"{{ path('app_reclamation_repondre', {'id': reclamation.id}) }}\">
                                                        <i class=\"mdi mdi-reply\"></i> Traiter
                                                    </button>
                                                {% else %}
                                                    <a href=\"{{ path('app_reclamation_show', {'id': reclamation.id}) }}\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"mdi mdi-eye\"></i> Voir réponse
                                                    </a>
                                                {% endif %}
                                                <form method=\"post\" action=\"{{ path('app_reclamation_delete', {'id': reclamation.id}) }}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement cette réclamation ?');\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ reclamation.id) }}\">
                                                    <button class=\"btn btn-sm btn-danger\">
                                                        <i class=\"mdi mdi-delete\"></i> Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% else %}
                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">Aucune réclamation trouvée.</td>
                                    </tr>
                                {% endif %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {# MODALE UNIQUE avec labels correctement associés #}
    <div class=\"modal fade\" id=\"repondreGlobalModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">Répondre à la réclamation #<span id=\"reclamationIdSpan\"></span></h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form id=\"globalRepondreForm\" data-url=\"\">
                    <div class=\"modal-body\">
                        <div class=\"mb-3\">
                            <label for=\"reclamationDescription\" class=\"form-label\">Description de la réclamation</label>
                            <textarea id=\"reclamationDescription\" class=\"form-control\" rows=\"3\" readonly></textarea>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"reponseGlobal\" class=\"form-label\">Votre réponse</label>
                            <textarea id=\"reponseGlobal\" name=\"reponse\" class=\"form-control\" rows=\"4\" required></textarea>
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Envoyer la réponse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gérer le clic sur chaque bouton \"Traiter\"
            document.querySelectorAll('.btn-traiter').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const description = this.dataset.description;
                    const url = this.dataset.url;

                    // Remplir les champs de la modale
                    document.getElementById('reclamationIdSpan').innerText = id;
                    document.getElementById('reclamationDescription').value = description;
                    document.getElementById('reponseGlobal').value = '';
                    const form = document.getElementById('globalRepondreForm');
                    form.dataset.url = url;

                    // Ouvrir la modale Bootstrap 5
                    const modal = new bootstrap.Modal(document.getElementById('repondreGlobalModal'));
                    modal.show();
                });
            });

            // Soumission du formulaire de réponse en AJAX
            const form = document.getElementById('globalRepondreForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const url = this.dataset.url;
                const reponse = document.getElementById('reponseGlobal').value.trim();

                if (!reponse) {
                    alert('Veuillez entrer une réponse.');
                    return;
                }

                const formData = new FormData();
                formData.append('reponse', reponse);

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('repondreGlobalModal'));
                        modal.hide();
                        location.reload();
                    } else {
                        alert('Erreur : ' + (data.error || 'La réponse est vide'));
                    }
                })
                .catch(() => alert('Une erreur est survenue lors de l\\'envoi.'));
            });
        });
    </script>
{% endblock %}", "Objectif_reclamtion_back/rec9dim.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\Objectif_reclamtion_back\\rec9dim.html.twig");
    }
}
