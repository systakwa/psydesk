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

/* base.html.twig */
class __TwigTemplate_8a6fcac4337d79cca1bca0e21aab4ed4 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'sidebar' => [$this, 'block_sidebar'],
            'navbar' => [$this, 'block_navbar'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

        <!-- Bootstrap 5 CSS (ajout) -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">


    <!-- plugins:css -->
    <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/mdi/css/materialdesignicons.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/css/vendor.bundle.base.css"), "html", null, true);
        yield "\">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/jvectormap/jquery-jvectormap.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/flag-icon-css/css/flag-icon.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/owl-carousel-2/owl.carousel.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/owl-carousel-2/owl.theme.default.min.css"), "html", null, true);
        yield "\">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel=\"stylesheet\" href=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        yield "\">
    <!-- End layout styles -->

    <link rel=\"shortcut icon\" href=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/favicon.png"), "html", null, true);
        yield "\" />

    ";
        // line 33
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 34
        yield "</head>
<body>
    <div class=\"container-scroller\">
        ";
        // line 37
        yield from $this->unwrap()->yieldBlock('sidebar', $context, $blocks);
        // line 40
        yield "
        <div class=\"container-fluid page-body-wrapper\">
            ";
        // line 42
        yield from $this->unwrap()->yieldBlock('navbar', $context, $blocks);
        // line 45
        yield "
            <div class=\"main-panel\">
                <div class=\"content-wrapper\">
                    ";
        // line 48
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 49
        yield "                </div>

                ";
        // line 51
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 54
        yield "            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src=\"";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/js/vendor.bundle.base.js"), "html", null, true);
        yield "\"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/chart.js/Chart.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/progressbar.js/progressbar.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/jvectormap/jquery-jvectormap.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/vendors/owl-carousel-2/owl.carousel.min.js"), "html", null, true);
        yield "\"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/off-canvas.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/hoverable-collapse.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/misc.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/settings.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/todolist.js"), "html", null, true);
        yield "\"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src=\"";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/dashboard.js"), "html", null, true);
        yield "\"></script>
    <!-- End custom js for this page -->

    ";
        // line 82
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 83
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "Corona Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 33
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar"));

        // line 38
        yield "            ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "partials/_sidebar.html.twig");
        yield "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 43
        yield "                ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "partials/_navbar.html.twig");
        yield "
            ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 48
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 52
        yield "                    ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "partials/_footer.html.twig");
        yield "
                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 82
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  372 => 82,  358 => 52,  345 => 51,  323 => 48,  309 => 43,  296 => 42,  282 => 38,  269 => 37,  247 => 33,  224 => 6,  212 => 83,  210 => 82,  204 => 79,  197 => 75,  193 => 74,  189 => 73,  185 => 72,  181 => 71,  174 => 67,  170 => 66,  166 => 65,  162 => 64,  158 => 63,  151 => 59,  144 => 54,  142 => 51,  138 => 49,  136 => 48,  131 => 45,  129 => 42,  125 => 40,  123 => 37,  118 => 34,  116 => 33,  111 => 31,  105 => 28,  95 => 21,  91 => 20,  87 => 19,  83 => 18,  76 => 14,  72 => 13,  62 => 6,  55 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>{% block title %}Corona Admin{% endblock %}</title>

        <!-- Bootstrap 5 CSS (ajout) -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">


    <!-- plugins:css -->
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/css/vendor.bundle.base.css') }}\">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}\">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/style.css') }}\">
    <!-- End layout styles -->

    <link rel=\"shortcut icon\" href=\"{{ asset('assets/images/favicon.png') }}\" />

    {% block stylesheets %}{% endblock %}
</head>
<body>
    <div class=\"container-scroller\">
        {% block sidebar %}
            {{ include('partials/_sidebar.html.twig') }}
        {% endblock %}

        <div class=\"container-fluid page-body-wrapper\">
            {% block navbar %}
                {{ include('partials/_navbar.html.twig') }}
            {% endblock %}

            <div class=\"main-panel\">
                <div class=\"content-wrapper\">
                    {% block content %}{% endblock %}
                </div>

                {% block footer %}
                    {{ include('partials/_footer.html.twig') }}
                {% endblock %}
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src=\"{{ asset('assets/vendors/js/vendor.bundle.base.js') }}\"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src=\"{{ asset('assets/vendors/chart.js/Chart.min.js') }}\"></script>
    <script src=\"{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}\"></script>
    <script src=\"{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}\"></script>
    <script src=\"{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}\"></script>
    <script src=\"{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}\"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src=\"{{ asset('assets/js/off-canvas.js') }}\"></script>
    <script src=\"{{ asset('assets/js/hoverable-collapse.js') }}\"></script>
    <script src=\"{{ asset('assets/js/misc.js') }}\"></script>
    <script src=\"{{ asset('assets/js/settings.js') }}\"></script>
    <script src=\"{{ asset('assets/js/todolist.js') }}\"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src=\"{{ asset('assets/js/dashboard.js') }}\"></script>
    <!-- End custom js for this page -->

    {% block javascripts %}{% endblock %}
</body>
</html>", "base.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\base.html.twig");
    }
}
