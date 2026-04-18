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

/* Objectif_reclamtion_back/reclamation.html.twig */
class __TwigTemplate_6ba91111a9135e67412963d9cf6c7833 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Objectif_reclamtion_back/reclamation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Objectif_reclamtion_back/reclamation.html.twig"));

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

    <!-- Barre de recherche dynamique -->
    <div class=\"row mb-3\">
        <div class=\"col-md-6\">
            <div class=\"input-group\">
                <span class=\"input-group-text bg-primary text-white\"><i class=\"mdi mdi-magnify\"></i></span>
                <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"Rechercher par description, patient, email...\" autocomplete=\"off\">
            </div>
        </div>
        <div class=\"col-md-6 text-md-end\">
            <span class=\"badge bg-info\" id=\"resultCount\"></span>
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
                            <tbody id=\"reclamationsTableBody\">
                                ";
        // line 59
        yield "                                ";
        if ((array_key_exists("reclamations", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reclamations"]) || array_key_exists("reclamations", $context) ? $context["reclamations"] : (function () { throw new RuntimeError('Variable "reclamations" does not exist.', 59, $this->source); })())) > 0))) {
            // line 60
            yield "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reclamations"]) || array_key_exists("reclamations", $context) ? $context["reclamations"] : (function () { throw new RuntimeError('Variable "reclamations" does not exist.', 60, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["reclamation"]) {
                // line 61
                yield "                                        ";
                $context["estTraite"] = ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "reponse", [], "any", false, false, false, 61)) && (CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "reponse", [], "any", false, false, false, 61) != ""));
                // line 62
                yield "                                        <tr class=\"";
                if ((($tmp = (isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 62, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "table-success";
                } else {
                    yield "table-danger";
                }
                yield "\">
                                            <td>";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 63), "html", null, true);
                yield "</td>
                                            <td>";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 64), 0, 80), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 64)) > 80)) {
                    yield "...";
                }
                yield "</td>
                                            <td>";
                // line 65
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "date", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "date", [], "any", false, false, false, 65), "Y-m-d"), "html", null, true)) : (""));
                yield "</td>
                                            <td>";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 66), "nom", [], "any", false, false, false, 66), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 66), "prenom", [], "any", false, false, false, 66), "html", null, true);
                yield "</td>
                                            <td>";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "idPatient", [], "any", false, false, false, 67), "email", [], "any", false, false, false, 67), "html", null, true);
                yield "</td>
                                            <td>
                                                ";
                // line 69
                if ((($tmp = (isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 69, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 70
                    yield "                                                    <span class=\"badge bg-success\">Traité</span>
                                                ";
                } else {
                    // line 72
                    yield "                                                    <span class=\"badge bg-danger\">Non traité</span>
                                                ";
                }
                // line 74
                yield "                                            </td>
                                            <td>
                                                ";
                // line 76
                if ((($tmp =  !(isset($context["estTraite"]) || array_key_exists("estTraite", $context) ? $context["estTraite"] : (function () { throw new RuntimeError('Variable "estTraite" does not exist.', 76, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 77
                    yield "                                                    <button type=\"button\" class=\"btn btn-sm btn-primary btn-traiter\"
                                                            data-id=\"";
                    // line 78
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 78), "html", null, true);
                    yield "\"
                                                            data-description=\"";
                    // line 79
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "description", [], "any", false, false, false, 79), "html_attr");
                    yield "\"
                                                            data-url=\"";
                    // line 80
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_repondre", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 80)]), "html", null, true);
                    yield "\">
                                                        <i class=\"mdi mdi-reply\"></i> Traiter
                                                    </button>
                                                ";
                } else {
                    // line 84
                    yield "                                                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 84)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"mdi mdi-eye\"></i> Voir réponse
                                                    </a>
                                                ";
                }
                // line 88
                yield "                                                <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 88)]), "html", null, true);
                yield "\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement cette réclamation ?');\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["reclamation"], "id", [], "any", false, false, false, 89))), "html", null, true);
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
            // line 97
            yield "                                ";
        } else {
            // line 98
            yield "                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">Aucune réclamation trouvée.</td>
                                    </tr>
                                ";
        }
        // line 102
        yield "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale unique -->
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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 139
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

        // line 140
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Recherche dynamique
        const searchInput = document.getElementById('searchInput');
        const tbody = document.getElementById('reclamationsTableBody');
        const resultCountSpan = document.getElementById('resultCount');
        let debounceTimer;

       function loadReclamations(term = '') {
    const url = '";
        // line 149
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation_search_ajax");
        yield "?term=' + encodeURIComponent(term);
    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => {
        if (!response.ok) {
            // En cas d'erreur HTTP (500), on lit le texte de la réponse
            return response.text().then(text => {
                throw new Error(`HTTP \${response.status}: \${text.substring(0, 200)}`);
            });
        }
        return response.json();
    })
    .then(data => {
        updateTable(data);
        resultCountSpan.innerText = data.length + ' réclamation(s)';
    })
    .catch(error => {
        console.error('Erreur détaillée:', error.message);
        alert('Erreur serveur : ' + error.message);
    });
}
        function updateTable(reclamations) {
            if (reclamations.length === 0) {
                tbody.innerHTML = '<tr><td colspan=\"7\" class=\"text-center\">Aucune réclamation trouvée.</td></tr>';
                return;
            }

            let html = '';
            for (let rec of reclamations) {
                const estTraite = rec.estTraite;
                const rowClass = estTraite ? 'table-success' : 'table-danger';
                const statusBadge = estTraite ? '<span class=\"badge bg-success\">Traité</span>' : '<span class=\"badge bg-danger\">Non traité</span>';
                
                let desc = rec.description;
                if (desc.length > 80) desc = desc.substring(0, 80) + '...';
                
                html += `<tr class=\"\${rowClass}\">
                    <td>\${rec.id}</td>
                    <td>\${escapeHtml(desc)}</td>
                    <td>\${rec.date}</td>
                    <td>\${escapeHtml(rec.patientNom)} \${escapeHtml(rec.patientPrenom)}</td>
                    <td>\${escapeHtml(rec.patientEmail)}</td>
                    <td>\${statusBadge}</td>
                    <td>`;

                if (!estTraite) {
                    html += `<button type=\"button\" class=\"btn btn-sm btn-primary btn-traiter\"
                                    data-id=\"\${rec.id}\"
                                    data-description=\"\${escapeHtml(rec.description)}\"
                                    data-url=\"\${rec.urlTraiter}\">
                                <i class=\"mdi mdi-reply\"></i> Traiter
                            </button>`;
                } else {
                    html += `<a href=\"\${rec.urlShow}\" class=\"btn btn-sm btn-info\">
                                <i class=\"mdi mdi-eye\"></i> Voir réponse
                            </a>`;
                }

                html += `<form method=\"post\" action=\"\${rec.urlDelete}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement cette réclamation ?');\">
                            <input type=\"hidden\" name=\"_token\" value=\"\${rec.deleteToken}\">
                            <button class=\"btn btn-sm btn-danger\">
                                <i class=\"mdi mdi-delete\"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>`;
            }
            tbody.innerHTML = html;
            attachTraiterEvents();
        }

        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }

        function attachTraiterEvents() {
            document.querySelectorAll('.btn-traiter').forEach(button => {
                button.removeEventListener('click', handleTraiterClick);
                button.addEventListener('click', handleTraiterClick);
            });
        }

        function handleTraiterClick(e) {
            const button = e.currentTarget;
            const id = button.dataset.id;
            const description = button.dataset.description;
            const url = button.dataset.url;

            document.getElementById('reclamationIdSpan').innerText = id;
            document.getElementById('reclamationDescription').value = description;
            document.getElementById('reponseGlobal').value = '';
            const form = document.getElementById('globalRepondreForm');
            form.dataset.url = url;

            const modal = new bootstrap.Modal(document.getElementById('repondreGlobalModal'));
            modal.show();
        }

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    loadReclamations(this.value);
                }, 300);
            });
        }

        // Soumission du formulaire de réponse
        const repondreForm = document.getElementById('globalRepondreForm');
        if (repondreForm) {
            repondreForm.addEventListener('submit', function(e) {
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
                        loadReclamations(searchInput ? searchInput.value : '');
                    } else {
                        alert('Erreur : ' + (data.error || 'La réponse est vide'));
                    }
                })
                .catch(() => alert('Une erreur est survenue lors de l\\'envoi.'));
            });
        }

        attachTraiterEvents();
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
        return "Objectif_reclamtion_back/reclamation.html.twig";
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
        return array (  345 => 149,  332 => 140,  319 => 139,  273 => 102,  267 => 98,  264 => 97,  250 => 89,  245 => 88,  237 => 84,  230 => 80,  226 => 79,  222 => 78,  219 => 77,  217 => 76,  213 => 74,  209 => 72,  205 => 70,  203 => 69,  198 => 67,  192 => 66,  188 => 65,  181 => 64,  177 => 63,  168 => 62,  165 => 61,  160 => 60,  157 => 59,  109 => 13,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
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

    <!-- Barre de recherche dynamique -->
    <div class=\"row mb-3\">
        <div class=\"col-md-6\">
            <div class=\"input-group\">
                <span class=\"input-group-text bg-primary text-white\"><i class=\"mdi mdi-magnify\"></i></span>
                <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"Rechercher par description, patient, email...\" autocomplete=\"off\">
            </div>
        </div>
        <div class=\"col-md-6 text-md-end\">
            <span class=\"badge bg-info\" id=\"resultCount\"></span>
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
                            <tbody id=\"reclamationsTableBody\">
                                {# Affichage initial des réclamations (sera remplacé par AJAX) #}
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

    <!-- Modale unique -->
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
        // Recherche dynamique
        const searchInput = document.getElementById('searchInput');
        const tbody = document.getElementById('reclamationsTableBody');
        const resultCountSpan = document.getElementById('resultCount');
        let debounceTimer;

       function loadReclamations(term = '') {
    const url = '{{ path('app_reclamation_search_ajax') }}?term=' + encodeURIComponent(term);
    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => {
        if (!response.ok) {
            // En cas d'erreur HTTP (500), on lit le texte de la réponse
            return response.text().then(text => {
                throw new Error(`HTTP \${response.status}: \${text.substring(0, 200)}`);
            });
        }
        return response.json();
    })
    .then(data => {
        updateTable(data);
        resultCountSpan.innerText = data.length + ' réclamation(s)';
    })
    .catch(error => {
        console.error('Erreur détaillée:', error.message);
        alert('Erreur serveur : ' + error.message);
    });
}
        function updateTable(reclamations) {
            if (reclamations.length === 0) {
                tbody.innerHTML = '<tr><td colspan=\"7\" class=\"text-center\">Aucune réclamation trouvée.</td></tr>';
                return;
            }

            let html = '';
            for (let rec of reclamations) {
                const estTraite = rec.estTraite;
                const rowClass = estTraite ? 'table-success' : 'table-danger';
                const statusBadge = estTraite ? '<span class=\"badge bg-success\">Traité</span>' : '<span class=\"badge bg-danger\">Non traité</span>';
                
                let desc = rec.description;
                if (desc.length > 80) desc = desc.substring(0, 80) + '...';
                
                html += `<tr class=\"\${rowClass}\">
                    <td>\${rec.id}</td>
                    <td>\${escapeHtml(desc)}</td>
                    <td>\${rec.date}</td>
                    <td>\${escapeHtml(rec.patientNom)} \${escapeHtml(rec.patientPrenom)}</td>
                    <td>\${escapeHtml(rec.patientEmail)}</td>
                    <td>\${statusBadge}</td>
                    <td>`;

                if (!estTraite) {
                    html += `<button type=\"button\" class=\"btn btn-sm btn-primary btn-traiter\"
                                    data-id=\"\${rec.id}\"
                                    data-description=\"\${escapeHtml(rec.description)}\"
                                    data-url=\"\${rec.urlTraiter}\">
                                <i class=\"mdi mdi-reply\"></i> Traiter
                            </button>`;
                } else {
                    html += `<a href=\"\${rec.urlShow}\" class=\"btn btn-sm btn-info\">
                                <i class=\"mdi mdi-eye\"></i> Voir réponse
                            </a>`;
                }

                html += `<form method=\"post\" action=\"\${rec.urlDelete}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Supprimer définitivement cette réclamation ?');\">
                            <input type=\"hidden\" name=\"_token\" value=\"\${rec.deleteToken}\">
                            <button class=\"btn btn-sm btn-danger\">
                                <i class=\"mdi mdi-delete\"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>`;
            }
            tbody.innerHTML = html;
            attachTraiterEvents();
        }

        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }

        function attachTraiterEvents() {
            document.querySelectorAll('.btn-traiter').forEach(button => {
                button.removeEventListener('click', handleTraiterClick);
                button.addEventListener('click', handleTraiterClick);
            });
        }

        function handleTraiterClick(e) {
            const button = e.currentTarget;
            const id = button.dataset.id;
            const description = button.dataset.description;
            const url = button.dataset.url;

            document.getElementById('reclamationIdSpan').innerText = id;
            document.getElementById('reclamationDescription').value = description;
            document.getElementById('reponseGlobal').value = '';
            const form = document.getElementById('globalRepondreForm');
            form.dataset.url = url;

            const modal = new bootstrap.Modal(document.getElementById('repondreGlobalModal'));
            modal.show();
        }

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    loadReclamations(this.value);
                }, 300);
            });
        }

        // Soumission du formulaire de réponse
        const repondreForm = document.getElementById('globalRepondreForm');
        if (repondreForm) {
            repondreForm.addEventListener('submit', function(e) {
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
                        loadReclamations(searchInput ? searchInput.value : '');
                    } else {
                        alert('Erreur : ' + (data.error || 'La réponse est vide'));
                    }
                })
                .catch(() => alert('Une erreur est survenue lors de l\\'envoi.'));
            });
        }

        attachTraiterEvents();
    </script>
{% endblock %}", "Objectif_reclamtion_back/reclamation.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\Objectif_reclamtion_back\\reclamation.html.twig");
    }
}
