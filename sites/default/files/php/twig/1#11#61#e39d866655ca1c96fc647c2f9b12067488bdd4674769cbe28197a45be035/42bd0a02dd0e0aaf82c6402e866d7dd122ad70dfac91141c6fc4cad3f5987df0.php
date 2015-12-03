<?php

/* themes/contrib/adminimal_theme/templates/page.html.twig */
class __TwigTemplate_1161e39d866655ca1c96fc647c2f9b12067488bdd4674769cbe28197a45be035 extends Twig_Template
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
        // line 63
        echo "  <header id=\"branding\" class=\"clearfix\">
    <div class=\"layout-container\">
      ";
        // line 65
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true);
        echo "
      ";
        // line 66
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 67
            echo "        <h1 class=\"page-title\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo "</h1>
      ";
        }
        // line 69
        echo "      ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true);
        echo "
      ";
        // line 70
        if ((isset($context["primary_local_tasks"]) ? $context["primary_local_tasks"] : null)) {
            // line 71
            echo "        ";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["primary_local_tasks"]) ? $context["primary_local_tasks"] : null), "html", null, true);
            echo "
      ";
        }
        // line 73
        echo "    </div>
  </header>

  <div class=\"layout-container\">

    <div class=\"breadcrumb-container\">
      ";
        // line 79
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "html", null, true);
        echo "
    </div>
    
    ";
        // line 82
        if ((isset($context["secondary_local_tasks"]) ? $context["secondary_local_tasks"] : null)) {
            // line 83
            echo "      <div class=\"tabs-secondary clearfix\" role=\"navigation\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["secondary_local_tasks"]) ? $context["secondary_local_tasks"] : null), "html", null, true);
            echo "</div>
    ";
        }
        // line 85
        echo "
    <main id=\"content\" class=\"clearfix\" role=\"main\">
      <div class=\"visually-hidden\"><a id=\"main-content\" tabindex=\"-1\"></a></div>
      ";
        // line 88
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["messages"]) ? $context["messages"] : null), "html", null, true);
        echo "
      ";
        // line 89
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array())) {
            // line 90
            echo "        <div id=\"help\">
          ";
            // line 91
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 94
        echo "      ";
        if ((isset($context["action_links"]) ? $context["action_links"] : null)) {
            // line 95
            echo "        <ul class=\"action-links\">
          ";
            // line 96
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["action_links"]) ? $context["action_links"] : null), "html", null, true);
            echo "
        </ul>
      ";
        }
        // line 99
        echo "      ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true);
        echo "
    </main>
    ";
        // line 101
        if ((isset($context["feed_icons"]) ? $context["feed_icons"] : null)) {
            // line 102
            echo "      <footer id=\"footer\" role=\"contentinfo\" class=\"layout-column\">
          ";
            // line 103
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["feed_icons"]) ? $context["feed_icons"] : null), "html", null, true);
            echo "
      </footer>
    ";
        }
        // line 106
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/adminimal_theme/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 106,  113 => 103,  110 => 102,  108 => 101,  102 => 99,  96 => 96,  93 => 95,  90 => 94,  84 => 91,  81 => 90,  79 => 89,  75 => 88,  70 => 85,  64 => 83,  62 => 82,  56 => 79,  48 => 73,  42 => 71,  40 => 70,  35 => 69,  29 => 67,  27 => 66,  23 => 65,  19 => 63,);
    }
}
