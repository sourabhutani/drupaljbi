<?php

/* {# inline_template_start #}<div>
<p> <strong> {{ title }} </strong> <br/>
Location : {{ field_event_location }}  | Date :  {{ field_event_date }} </p>
{{ body }} <br/>
<span > {{ drupal_form('Drupal\\event_forms\\Form\\ApplyButtonForm',  nid, title) }} </span>
</div> */
class __TwigTemplate_5406652b1388b73d69bee8410d0d32d98c671f1f5402f33cedaea9a1f58d8652 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array("drupal_form" => 5);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array(),
                array('drupal_form')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div>
<p> <strong> ";
        // line 2
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo " </strong> <br/>
Location : ";
        // line 3
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["field_event_location"]) ? $context["field_event_location"] : null), "html", null, true));
        echo "  | Date :  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["field_event_date"]) ? $context["field_event_date"] : null), "html", null, true));
        echo " </p>
";
        // line 4
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["body"]) ? $context["body"] : null), "html", null, true));
        echo " <br/>
<span > ";
        // line 5
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalForm("Drupal\\event_forms\\Form\\ApplyButtonForm", (isset($context["nid"]) ? $context["nid"] : null), (isset($context["title"]) ? $context["title"] : null)), "html", null, true));
        echo " </span>
</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div>
<p> <strong> {{ title }} </strong> <br/>
Location : {{ field_event_location }}  | Date :  {{ field_event_date }} </p>
{{ body }} <br/>
<span > {{ drupal_form('Drupal\\\\event_forms\\\\Form\\\\ApplyButtonForm',  nid, title) }} </span>
</div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 5,  61 => 4,  55 => 3,  51 => 2,  48 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "{# inline_template_start #}<div>
<p> <strong> {{ title }} </strong> <br/>
Location : {{ field_event_location }}  | Date :  {{ field_event_date }} </p>
{{ body }} <br/>
<span > {{ drupal_form('Drupal\\\\event_forms\\\\Form\\\\ApplyButtonForm',  nid, title) }} </span>
</div>", "");
    }
}
