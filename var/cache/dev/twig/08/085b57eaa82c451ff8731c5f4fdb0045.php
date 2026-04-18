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

/* partials/_sidebar.html.twig */
class __TwigTemplate_bd8c11ee4539367424921091cf6b784a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_sidebar.html.twig"));

        // line 1
        yield "<nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
    <div class=\"sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top\">
        <a class=\"sidebar-brand brand-logo\" href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
            <img src=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo.png"), "html", null, true);
        yield "\" alt=\"logo\" />
        </a>
        <a class=\"sidebar-brand brand-logo-mini\" href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
            <img src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-mini.png"), "html", null, true);
        yield "\" alt=\"logo\" />
        </a>
    </div>
    <ul class=\"nav\">
        <li class=\"nav-item profile\">
            <div class=\"profile-desc\">
                <div class=\"profile-pic\">
                    <div class=\"count-indicator\">
                        <img class=\"img-xs rounded-circle\" src=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/faces/face15.jpg"), "html", null, true);
        yield "\" alt=\"\">
                        <span class=\"count bg-success\"></span>
                    </div>
                    <div class=\"profile-name\">
                        <h5 class=\"mb-0 font-weight-normal\">Henry Klein</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                <a href=\"#\" id=\"profile-dropdown\" data-toggle=\"dropdown\"><i class=\"mdi mdi-dots-vertical\"></i></a>
                <div class=\"dropdown-menu dropdown-menu-right sidebar-dropdown preview-list\" aria-labelledby=\"profile-dropdown\">
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-primary\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">Account settings</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-onepassword text-info\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">Change Password</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-calendar-today text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class=\"nav-item nav-category\">
            <span class=\"nav-link\">Navigation</span>
        </li>
        <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">Dashboard</span>
            </a>
        </li>
        
        <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reclamation");
        yield "\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">reclamation</span>
            <a class=\"nav-link\" href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">Déconnexion</span>
                        
            </ul>
            </a>
        </li>
        
</nav>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_sidebar.html.twig";
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
        return array (  148 => 78,  140 => 73,  128 => 64,  76 => 15,  65 => 7,  61 => 6,  56 => 4,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
    <div class=\"sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top\">
        <a class=\"sidebar-brand brand-logo\" href=\"{{ path('app_dashboard') }}\">
            <img src=\"{{ asset('assets/images/logo.png') }}\" alt=\"logo\" />
        </a>
        <a class=\"sidebar-brand brand-logo-mini\" href=\"{{ path('app_dashboard') }}\">
            <img src=\"{{ asset('assets/images/logo-mini.png') }}\" alt=\"logo\" />
        </a>
    </div>
    <ul class=\"nav\">
        <li class=\"nav-item profile\">
            <div class=\"profile-desc\">
                <div class=\"profile-pic\">
                    <div class=\"count-indicator\">
                        <img class=\"img-xs rounded-circle\" src=\"{{ asset('assets/images/faces/face15.jpg') }}\" alt=\"\">
                        <span class=\"count bg-success\"></span>
                    </div>
                    <div class=\"profile-name\">
                        <h5 class=\"mb-0 font-weight-normal\">Henry Klein</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                <a href=\"#\" id=\"profile-dropdown\" data-toggle=\"dropdown\"><i class=\"mdi mdi-dots-vertical\"></i></a>
                <div class=\"dropdown-menu dropdown-menu-right sidebar-dropdown preview-list\" aria-labelledby=\"profile-dropdown\">
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-primary\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">Account settings</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-onepassword text-info\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">Change Password</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\" class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-calendar-today text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1 text-small\">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class=\"nav-item nav-category\">
            <span class=\"nav-link\">Navigation</span>
        </li>
        <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"{{ path('app_dashboard') }}\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">Dashboard</span>
            </a>
        </li>
        
        <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"{{ path('app_reclamation') }}\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">reclamation</span>
            <a class=\"nav-link\" href=\"{{ path('app_logout') }}\">
                <span class=\"menu-icon\">
                    <i class=\"mdi mdi-speedometer\"></i>
                </span>
                <span class=\"menu-title\">Déconnexion</span>
                        
            </ul>
            </a>
        </li>
        
</nav>
", "partials/_sidebar.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\partials\\_sidebar.html.twig");
    }
}
