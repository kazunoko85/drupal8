<?php

/* core/themes/classy/templates/field/image-formatter.html.twig */
class __TwigTemplate_410db3ee9d040b609a062e2526ddcdbc9be4867370e48fe7cb1969f7879c00e8 extends Twig_Template
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
        // line 15
        if ((isset($context["url"]) ? $context["url"] : null)) {
            // line 16
            echo "  <a href=\"";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image"]) ? $context["image"] : null), "html", null, true);
            echo "</a>
";
        } else {
            // line 18
            echo "  ";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image"]) ? $context["image"] : null), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/field/image-formatter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 18,  21 => 16,  19 => 15,);
    }
}
