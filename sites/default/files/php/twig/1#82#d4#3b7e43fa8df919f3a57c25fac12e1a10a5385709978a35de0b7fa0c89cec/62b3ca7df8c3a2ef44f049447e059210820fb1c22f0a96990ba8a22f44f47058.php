<?php

/* core/modules/views/templates/views-exposed-form.html.twig */
class __TwigTemplate_82d43b7e43fa8df919f3a57c25fac12e1a10a5385709978a35de0b7fa0c89cec extends Twig_Template
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
        // line 14
        if ( !twig_test_empty((isset($context["q"]) ? $context["q"] : null))) {
            // line 15
            echo "  ";
            // line 19
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["q"]) ? $context["q"] : null), "html", null, true);
            echo "
";
        }
        // line 21
        echo "<div class=\"form--inline clearfix\">
  ";
        // line 22
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["form"]) ? $context["form"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views/templates/views-exposed-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 22,  28 => 21,  23 => 19,  21 => 15,  19 => 14,);
    }
}
