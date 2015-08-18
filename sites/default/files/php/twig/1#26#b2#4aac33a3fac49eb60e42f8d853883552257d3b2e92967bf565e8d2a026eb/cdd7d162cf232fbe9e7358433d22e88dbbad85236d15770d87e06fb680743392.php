<?php

/* core/themes/bartik/templates/maintenance-page.html.twig */
class __TwigTemplate_26b24aac33a3fac49eb60e42f8d853883552257d3b2e92967bf565e8d2a026eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" role=\"banner\">
      <div class=\"section clearfix\">
        ";
        // line 15
        if (((isset($context["site_name"]) ? $context["site_name"] : null) || (isset($context["site_slogan"]) ? $context["site_slogan"] : null))) {
            // line 16
            echo "          <div id=\"name-and-slogan\"";
            echo $this->env->getExtension('drupal_core')->renderVar(((((isset($context["hide_site_name"]) ? $context["hide_site_name"] : null) && (isset($context["hide_site_slogan"]) ? $context["hide_site_slogan"] : null))) ? (" class=\"visually-hidden\"") : ("")));
            echo ">
            ";
            // line 17
            if ((isset($context["site_name"]) ? $context["site_name"] : null)) {
                // line 18
                echo "              <div id=\"site-name\"";
                echo $this->env->getExtension('drupal_core')->renderVar((((isset($context["hide_site_name"]) ? $context["hide_site_name"] : null)) ? (" class=\"visually-hidden\"") : ("")));
                echo ">
                <strong>
                  <a href=\"";
                // line 20
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('drupal_core')->renderVar(t("Home"));
                echo "\" rel=\"home\"><span>";
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
                echo "</span></a>
                </strong>
              </div>
            ";
            }
            // line 24
            echo "            ";
            if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
                // line 25
                echo "              <div id=\"site-slogan\"";
                echo $this->env->getExtension('drupal_core')->renderVar((((isset($context["hide_site_slogan"]) ? $context["hide_site_slogan"] : null)) ? (" class=\"visually-hidden\"") : ("")));
                echo ">
                ";
                // line 26
                echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["site_slogan"]) ? $context["site_slogan"] : null), "html", null, true);
                echo "
              </div>
            ";
            }
            // line 29
            echo "          </div>
        ";
        }
        // line 31
        echo "      </div>
    </header>
    <div id=\"main-wrapper\">
      <div id=\"main\" class=\"clearfix\">
        <main id=\"content\" class=\"column\" role=\"main\">
          <section class=\"section\">
            <a id=\"main-content\"></a>
            ";
        // line 38
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 39
            echo "              <h1 class=\"title\" id=\"page-title\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo "</h1>
            ";
        }
        // line 41
        echo "            ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true);
        echo "
            ";
        // line 42
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "messages", array()), "html", null, true);
        echo "
          </section>
        </main>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/maintenance-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 42,  86 => 41,  80 => 39,  78 => 38,  69 => 31,  65 => 29,  59 => 26,  54 => 25,  51 => 24,  40 => 20,  34 => 18,  32 => 17,  27 => 16,  25 => 15,  19 => 11,);
    }
}
