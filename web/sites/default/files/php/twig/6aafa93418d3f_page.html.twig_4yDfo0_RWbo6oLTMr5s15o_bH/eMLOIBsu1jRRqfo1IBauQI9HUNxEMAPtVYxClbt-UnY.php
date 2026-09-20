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
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/heritage_museum/templates/page.html.twig */
class __TwigTemplate_96302f9a69307e5a6d480f4882444e88 extends Template
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
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"museum-site\">

  <header class=\"museum-header\">
    <div class=\"museum-header-inner\">

      <a href=\"";
        // line 6
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        yield "\" class=\"museum-brand\">
        <span class=\"museum-brand-icon\">
          <img src=\"/themes/custom/heritage_museum/images/logo-header.png\" alt=\"Oriental Mindoro Heritage Museum logo\">
        </span>

        <span class=\"museum-brand-text\">
          <strong>ORIENTAL MINDORO</strong>
          <span>HERITAGE MUSEUM</span>
        </span>
      </a>

      <nav class=\"museum-navigation\">
        ";
        // line 18
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 18), "html", null, true);
        yield "
      </nav>

      <a href=\"";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        yield "\" class=\"museum-header-button\">
        View All Exhibits
      </a>

    </div>
  </header>


  ";
        // line 29
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 30
            yield "    <div class=\"museum-breadcrumb\">
      <div class=\"museum-container\">
        ";
            // line 32
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 32), "html", null, true);
            yield "
      </div>
    </div>
  ";
        }
        // line 36
        yield "

  <main class=\"museum-main\">
    <div class=\"museum-container\">

      ";
        // line 41
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 41), "html", null, true);
        yield "

    </div>
  </main>


  <footer class=\"museum-footer\">
    <div class=\"museum-footer-inner\">

      <div class=\"museum-footer-brand\">
        <strong>ORIENTAL MINDORO</strong>
        <span>HERITAGE MUSEUM</span>
      </div>

      <div class=\"museum-footer-tagline\">
        Preserving Our Past, Inspiring Our Future
      </div>

      <div class=\"museum-footer-social\">
        <span>f</span>
        <span>◎</span>
        <span>▶</span>
      </div>

    </div>
  </footer>

</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/heritage_museum/templates/page.html.twig";
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
        return array (  103 => 41,  96 => 36,  89 => 32,  85 => 30,  83 => 29,  72 => 21,  66 => 18,  51 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/heritage_museum/templates/page.html.twig", "/var/www/html/web/themes/custom/heritage_museum/templates/page.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 29];
        static $filters = ["escape" => 18];
        static $functions = ["path" => 6];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape"],
                [0 => "path"],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
