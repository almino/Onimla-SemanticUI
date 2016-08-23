<?php

namespace Onimla\SemanticUI\Form;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\SemanticUI\Component;
use Onimla\HTML\Input;
use Onimla\HTML\Label;

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\SemanticUI\Component $container
 * @property \Onimla\HTML\Input $input
 * @property \Onimla\HTML\Label $label
 */
abstract class ContainerInputLabel extends Node implements HasAttribute {

    /**
     * Don't you forget to set up the tree order.
     * @param string|\Onimla\HTML\Element $label
     * @param string|\Onimla\HTML\Element $name
     * @param string $value
     */
    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new Component;
        $this->input = $name instanceof Element ? $name : new Input($name, $value);
        $this->label = $label instanceof Element ? $label : new Label($this->input, $label);

        # Atributos ================================================================== #
        # Árvore ===================================================================== #
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    /**
     * <code>$label</code> and <code>$input</code> are references for <code>$container</code>'s children.
     */
    public function __clone() {
        $this->container = clone $this->container;
        $this->label = $this->container->label;
        $this->input = $this->container->input;
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        return call_user_func_array(array($this->input, __FUNCTION__), func_get_args());
    }

    public function data($key, $value = FALSE, $output = 'encode') {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeAttr($name) {
        $this->input->removeAttr(...func_get_args());
        return $this;
    }

    public function getClassAttribute() {
        return $this->container->getClassAttribute();
    }

    public function addClass($class) {
        $this->container->addClass(...func_get_args());
        return $this;
    }

    public function removeClass($class) {
        $this->container->removeClass(...func_get_args());
        return $this;
    }

    public function &findByAttr($attr, $value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findById($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findByName($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchAttr($name, $regex, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchClass($classes, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function id($value = FALSE) {
        if (strlen($this->input->id()) < 1) {
            $this->input->uniqid();
        }

        if ($value === FALSE) {
            return call_user_func(array($this->input, __FUNCTION__));
        }

        call_user_func(array($this->input, __FUNCTION__), $value);
        $this->label->for($this->input->id());
        return $this;
    }

    public function uniqid($prefix = '', $more_entropy = FALSE) {
        call_user_func_array(array($this->input, __FUNCTION__), func_get_args());
        $this->label->for($this->input->id());
        return $this;
    }

    /**
     * Get / set value for <code>name</code> attribute
     * @param string $value
     * @return string|\Onimla\SemanticUI\Form\Field
     */
    public function name($value = FALSE) {
        if ($value === FALSE) {
            return call_user_func(array($this->input, __FUNCTION__));
        }

        call_user_func(array($this->input, __FUNCTION__), $value);
        return $this;
    }

    public function required() {
        return $this->setRequired();
    }

    public function isRequired() {
        return $this->setRequired();
    }

    public function isNotRequired() {
        return $this->unsetRequired();
    }

    public function setRequired() {
        $this->container->getClassAttribute()->prepend('required');
        call_user_func(array($this->input, __FUNCTION__));
        return $this;
    }

    public function unsetRequired() {
        $this->container->removeClass('required');
        call_user_func(array($this->input, __FUNCTION__));
        return $this;
    }

    public function value($value = FALSE) {
        if ($value === FALSE) {
            return $this->input->attr(__FUNCTION__);
        }

        $this->input->value($value);

        return $this;
    }

    public function isValueSet() {
        $value = $this->input->getAttribute('value');
        return $value ? $value->isValueSet() : FALSE;
    }

    public function prepend($children) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    /**
     * @param string|\Onimla\HTML\Element $text
     * @return string|\Onimla\SemanticUI\Form\Field
     */
    public function text($text = FALSE) {
        $params = self::filterChildren(func_get_args());

        if (count($params) < 1) {
            return $this->container->text();
        }

        $this->label->text(...func_get_args());
        return $this;
    }

    public function appendText($text) {
        call_user_func_array(array($this->label, __FUNCTION__), func_get_args());
        return $this;
    }

    /**
     * 
     * @param string|\Onimla\HTML\Element $text optional
     * @return \Onimla\SemanticUI\Form\Field|\Onimla\HTML\Label
     */
    public function label($text = FALSE) {
        $params = self::filterChildren(func_get_args());

        if (count($params) < 1) {
            return isset($this->label) ? $this->label : FALSE;
        }

        if (!$text instanceof Element) {
            $text = new Label(FALSE, func_get_args());
        }

        $this->label = $text;
        $this->container->label = $this->label;

        $this->label->for($this->input());

        return $this;
    }

    /**
     * 
     * @param object $instance optional
     * @return \Onimla\SemanticUI\Form\Field|\Onimla\HTML\Input
     */
    public function input($instance = NULL) {
        if ($instance === NULL) {
            return isset($this->input) ? $this->input : FALSE;
        }

        $this->input = $instance;
        $this->container->input = $this->input;
        
        if ($this->input->id() === FALSE) {
            $this->input()->uniqid();
        }

        $this->label->for($this->input->id());

        return $this;
    }

    public function path() {
        return call_user_func(array($this->label, __FUNCTION__))
                . ', ' . call_user_func(array($this->input, __FUNCTION__));
    }

}
