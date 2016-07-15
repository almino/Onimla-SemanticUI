<?php

namespace Onimla\SemanticUI\Form;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;
use Onimla\HTML\Element;
use Onimla\HTML\Input;
use Onimla\HTML\Label;

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\HTML\Element $container
 * @property \Onimla\HTML\Input $input
 * @property \Onimla\HTML\Label $label
 */
class Field extends Node implements HasAttribute, Appendable {

    const CLASS_NAME = 'field';

    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new Element('div');
        $this->input = new Input($name, $value);
        $this->label = new Label($this->input, $label);
        $this->id = $this->input->id();

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

        # Árvore ===================================================================== #
        $this->container->label = $this->label;
        $this->container->input = $this->input;
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        return call_user_func_array(array($this->input, __FUNCTION__), func_get_args());
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
        if ($value === FALSE) {
            return call_user_func(array($this->input, __FUNCTION__));
        }

        call_user_func(array($this->input, __FUNCTION__), $value);
        return $this;
    }

    public function error() {
        $this->container->getClassAttribute()->after(self::CLASS_NAME, 'error');
    }

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

    public function append($children) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function input(Element $instance = NULL) {
        if ($instance === NULL) {
            return isset($this->input) ? $this->input : FALSE;
        }

        $this->input = $instance;
        $this->container->input = $this->input;

        return $this;
    }

}
