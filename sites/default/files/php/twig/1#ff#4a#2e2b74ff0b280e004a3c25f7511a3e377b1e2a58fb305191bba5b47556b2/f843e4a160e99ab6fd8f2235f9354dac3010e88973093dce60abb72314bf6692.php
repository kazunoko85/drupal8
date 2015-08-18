<?php

/* core/modules/views/templates/views-view-rss.html.twig */
class __TwigTemplate_ff4a2e2b74ff0b280e004a3c25f7511a3e377b1e2a58fb305191bba5b47556b2 extends Twig_Template
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
        // line 20
        echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>
<rss version=\"2.0\" xml:base=\"";
        // line 21
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "\"";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["namespaces"]) ? $context["namespaces"] : null), "html", null, true);
        echo ">
  <channel>
    <title>";
        // line 23
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
    <link>";
        // line 24
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "</link>
    <description>";
        // line 25
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["description"]) ? $context["description"] : null), "html", null, true);
        echo "</description>
    <language>";
        // line 26
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["langcode"]) ? $context["langcode"] : null), "html", null, true);
        echo "</language>
    ";
        // line 27
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["channel_elements"]) ? $context["channel_elements"] : null), "html", null, true);
        echo "
    ";
        // line 28
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["items"]) ? $context["items"] : null), "html", null, true);
        echo "
  </channel>
</rss>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views/templates/views-view-rss.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 28,  45 => 27,  41 => 26,  37 => 25,  33 => 24,  29 => 23,  22 => 21,  19 => 20,);
    }
}
