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

/* partials/_navbar.html.twig */
class __TwigTemplate_836278a7a731ac74ba818c4ac82161d3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_navbar.html.twig"));

        // line 1
        yield "<nav class=\"navbar p-0 fixed-top d-flex flex-row\">
    <div class=\"navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center\">
        <a class=\"navbar-brand brand-logo-mini\" href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
            <img src=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-mini.png"), "html", null, true);
        yield "\" alt=\"logo\" />
        </a>
    </div>
    
    <div class=\"navbar-menu-wrapper flex-grow d-flex align-items-stretch\">
        <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-toggle=\"minimize\">
            <span class=\"mdi mdi-menu\"></span>
        </button>
        <ul class=\"navbar-nav w-100\">
            <li class=\"nav-item w-100\">
                <form class=\"nav-link mt-2 mt-md-0 d-none d-lg-flex search\">
                    <input type=\"text\" name=\"search\" id=\"search-input\" class=\"form-control\" placeholder=\"Search products\">
                </form>
            </li>
        </ul>
        <ul class=\"navbar-nav navbar-nav-right\">
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"createbuttonDropdown\">
                    <h6 class=\"p-3 mb-0\">Projects</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-file-outline text-primary\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Software Development</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-web text-info\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">UI Development</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-layers text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Software Testing</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">See all projects</p>
                </div>
            </li>
            <li class=\"nav-item nav-settings d-none d-lg-block\">
                <a class=\"nav-link\" href=\"#\">
                    <i class=\"mdi mdi-view-grid\"></i>
                </a>
            </li>
            <li class=\"nav-item dropdown border-left\">
                <a class=\"nav-link count-indicator dropdown-toggle\" id=\"messageDropdown\" href=\"#\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"mdi mdi-email\"></i>
                    <span class=\"count bg-success\"></span>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"messageDropdown\">
                    <h6 class=\"p-3 mb-0\">Messages</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/faces/face4.jpg"), "html", null, true);
        yield "\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Mark send you a message</p>
                            <p class=\"text-muted mb-0\"> 1 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/faces/face2.jpg"), "html", null, true);
        yield "\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Cregh send you a message</p>
                            <p class=\"text-muted mb-0\"> 15 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/faces/face3.jpg"), "html", null, true);
        yield "\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Profile picture updated</p>
                            <p class=\"text-muted mb-0\"> 18 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">4 new messages</p>
                </div>
            </li>
            <li class=\"nav-item dropdown border-left\">
                <a class=\"nav-link count-indicator dropdown-toggle\" id=\"notificationDropdown\" href=\"#\" data-toggle=\"dropdown\">
                    <i class=\"mdi mdi-bell\"></i>
                    <span class=\"count bg-danger\"></span>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"notificationDropdown\">
                    <h6 class=\"p-3 mb-0\">Notifications</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-calendar text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Event today</p>
                            <p class=\"text-muted ellipsis mb-0\"> Just a reminder that you have an event today </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Settings</p>
                            <p class=\"text-muted ellipsis mb-0\"> Update dashboard </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-link-variant text-warning\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Launch Admin</p>
                            <p class=\"text-muted ellipsis mb-0\"> New admin wow! </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">See all notifications</p>
                </div>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link\" id=\"profileDropdown\" href=\"#\" data-toggle=\"dropdown\">
                    <div class=\"navbar-profile\">
                        <img class=\"img-xs rounded-circle\" src=\"";
        // line 156
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/faces/face15.jpg"), "html", null, true);
        yield "\" alt=\"\">
                        <p class=\"mb-0 d-none d-sm-block navbar-profile-name\">Henry Klein</p>
                        <i class=\"mdi mdi-menu-down d-none d-sm-block\"></i>
                    </div>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"profileDropdown\">
                    <h6 class=\"p-3 mb-0\">Profile</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Settings</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-logout text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Log out</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">Advanced settings</p>
                </div>
            </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-toggle=\"offcanvas\">
            <span class=\"mdi mdi-format-line-spacing\"></span>
        </button>
    </div>
</nav>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_navbar.html.twig";
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
        return array (  220 => 156,  156 => 95,  143 => 85,  130 => 75,  56 => 4,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"navbar p-0 fixed-top d-flex flex-row\">
    <div class=\"navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center\">
        <a class=\"navbar-brand brand-logo-mini\" href=\"{{ path('app_dashboard') }}\">
            <img src=\"{{ asset('assets/images/logo-mini.png') }}\" alt=\"logo\" />
        </a>
    </div>
    
    <div class=\"navbar-menu-wrapper flex-grow d-flex align-items-stretch\">
        <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-toggle=\"minimize\">
            <span class=\"mdi mdi-menu\"></span>
        </button>
        <ul class=\"navbar-nav w-100\">
            <li class=\"nav-item w-100\">
                <form class=\"nav-link mt-2 mt-md-0 d-none d-lg-flex search\">
                    <input type=\"text\" name=\"search\" id=\"search-input\" class=\"form-control\" placeholder=\"Search products\">
                </form>
            </li>
        </ul>
        <ul class=\"navbar-nav navbar-nav-right\">
            <li class=\"nav-item dropdown d-none d-lg-block\">
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"createbuttonDropdown\">
                    <h6 class=\"p-3 mb-0\">Projects</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-file-outline text-primary\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Software Development</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-web text-info\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">UI Development</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-layers text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Software Testing</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">See all projects</p>
                </div>
            </li>
            <li class=\"nav-item nav-settings d-none d-lg-block\">
                <a class=\"nav-link\" href=\"#\">
                    <i class=\"mdi mdi-view-grid\"></i>
                </a>
            </li>
            <li class=\"nav-item dropdown border-left\">
                <a class=\"nav-link count-indicator dropdown-toggle\" id=\"messageDropdown\" href=\"#\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"mdi mdi-email\"></i>
                    <span class=\"count bg-success\"></span>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"messageDropdown\">
                    <h6 class=\"p-3 mb-0\">Messages</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"{{ asset('assets/images/faces/face4.jpg') }}\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Mark send you a message</p>
                            <p class=\"text-muted mb-0\"> 1 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"{{ asset('assets/images/faces/face2.jpg') }}\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Cregh send you a message</p>
                            <p class=\"text-muted mb-0\"> 15 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <img src=\"{{ asset('assets/images/faces/face3.jpg') }}\" alt=\"image\" class=\"rounded-circle profile-pic\">
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject ellipsis mb-1\">Profile picture updated</p>
                            <p class=\"text-muted mb-0\"> 18 Minutes ago </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">4 new messages</p>
                </div>
            </li>
            <li class=\"nav-item dropdown border-left\">
                <a class=\"nav-link count-indicator dropdown-toggle\" id=\"notificationDropdown\" href=\"#\" data-toggle=\"dropdown\">
                    <i class=\"mdi mdi-bell\"></i>
                    <span class=\"count bg-danger\"></span>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"notificationDropdown\">
                    <h6 class=\"p-3 mb-0\">Notifications</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-calendar text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Event today</p>
                            <p class=\"text-muted ellipsis mb-0\"> Just a reminder that you have an event today </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Settings</p>
                            <p class=\"text-muted ellipsis mb-0\"> Update dashboard </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-link-variant text-warning\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Launch Admin</p>
                            <p class=\"text-muted ellipsis mb-0\"> New admin wow! </p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">See all notifications</p>
                </div>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link\" id=\"profileDropdown\" href=\"#\" data-toggle=\"dropdown\">
                    <div class=\"navbar-profile\">
                        <img class=\"img-xs rounded-circle\" src=\"{{ asset('assets/images/faces/face15.jpg') }}\" alt=\"\">
                        <p class=\"mb-0 d-none d-sm-block navbar-profile-name\">Henry Klein</p>
                        <i class=\"mdi mdi-menu-down d-none d-sm-block\"></i>
                    </div>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"profileDropdown\">
                    <h6 class=\"p-3 mb-0\">Profile</h6>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-settings text-success\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Settings</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item preview-item\">
                        <div class=\"preview-thumbnail\">
                            <div class=\"preview-icon bg-dark rounded-circle\">
                                <i class=\"mdi mdi-logout text-danger\"></i>
                            </div>
                        </div>
                        <div class=\"preview-item-content\">
                            <p class=\"preview-subject mb-1\">Log out</p>
                        </div>
                    </a>
                    <div class=\"dropdown-divider\"></div>
                    <p class=\"p-3 mb-0 text-center\">Advanced settings</p>
                </div>
            </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-toggle=\"offcanvas\">
            <span class=\"mdi mdi-format-line-spacing\"></span>
        </button>
    </div>
</nav>", "partials/_navbar.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\partials\\_navbar.html.twig");
    }
}
