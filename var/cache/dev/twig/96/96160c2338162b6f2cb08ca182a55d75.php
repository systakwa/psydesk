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

/* emails/reset_password_confirmation.html.twig */
class __TwigTemplate_594ff6105c31025eee83a11ab332bfd6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/reset_password_confirmation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/reset_password_confirmation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation de réinitialisation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .success-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <div class=\"header\">
            <h1>🔐 PSYDESK</h1>
        </div>
        <div class=\"content\">
            <div class=\"success-icon\">✅</div>
            <h2>Mot de passe réinitialisé</h2>
            <p>Bonjour <strong>";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 66, $this->source); })()), "prenom", [], "any", false, false, false, 66), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 66, $this->source); })()), "nom", [], "any", false, false, false, 66), "html", null, true);
        yield "</strong>,</p>
            <p>Votre mot de passe a été réinitialisé avec succès.</p>
            <p>Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.</p>
            <a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("app_login");
        yield "\" class=\"button\">🔑 Se connecter</a>
        </div>
        <div class=\"footer\">
            <p>&copy; ";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " PSYDESK - Plateforme de gestion pour psychologues et patients</p>
        </div>
    </div>
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
        return "emails/reset_password_confirmation.html.twig";
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
        return array (  129 => 72,  123 => 69,  115 => 66,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation de réinitialisation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .success-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <div class=\"header\">
            <h1>🔐 PSYDESK</h1>
        </div>
        <div class=\"content\">
            <div class=\"success-icon\">✅</div>
            <h2>Mot de passe réinitialisé</h2>
            <p>Bonjour <strong>{{ user.prenom }} {{ user.nom }}</strong>,</p>
            <p>Votre mot de passe a été réinitialisé avec succès.</p>
            <p>Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.</p>
            <a href=\"{{ url('app_login') }}\" class=\"button\">🔑 Se connecter</a>
        </div>
        <div class=\"footer\">
            <p>&copy; {{ \"now\"|date(\"Y\") }} PSYDESK - Plateforme de gestion pour psychologues et patients</p>
        </div>
    </div>
</body>
</html>", "emails/reset_password_confirmation.html.twig", "D:\\3A22\\web projet\\psydesk-users-management\\templates\\emails\\reset_password_confirmation.html.twig");
    }
}
