<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Node;
use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;

class Statistic extends Node implements HasAttribute {
    
    use Traits\Colored,
    Traits\Horizontal;

    public function __construct($value = FALSE, $label = FALSE) {
        parent::__construct();

        /* Instâncias =============================================================== */
        $this->container = new Component;
        $this->value($value);
        $this->label($label);

        /* Atributos ================================================================ */
        $this->container->getClassAttribute()->append(Constant::STATISTIC);

        /* Árvore =================================================================== */
        $this->container->value = $this->getValue();
        $this->container->label = $this->getLabel();
    }

    public function __clone() {
        $this->container = clone $this->container;

        $this->value = $this->container->value;
        $this->label = $this->container->label;
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function addClass($class) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return strlen($value) < 1 ? call_user_func_array(array($this->container, __FUNCTION__), func_get_args()) : $this;
    }

    public function data($key, $value = FALSE, $output = 'encode') {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return strlen($value) < 1 ? call_user_func_array(array($this->container, __FUNCTION__), func_get_args()) : $this;
    }

    public function findByAttr($attr, $value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function findById($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function findByName($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function getClassAttribute() {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function id($value = FALSE) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return strlen($value) < 1 ? call_user_func_array(array($this->container, __FUNCTION__), func_get_args()) : $this;
    }

    public function matchAttr($attr, $regexOrString, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function matchClass($classes, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeAttr($name) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeClass($class) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function getContainer() {
        return $this->container;
    }

    public function getValue() {
        if (!isset($this->value)) {
            $this->value = new Statistic\Value();
        }

        return $this->value;
    }

    public function setValue($instance) {
        if ($instance instanceof HasAttribute OR $instance instanceof Appendable) {
            $this->value = $instance;
        } else {
            $this->value = new Statistic\Value($instance);
        }
    }

    public function unsetValue() {
        $tmp = $this->getValue();
        unset($this->value);
        $this->getValue();
        return $tmp;
    }

    public function value($instance = FALSE) {
        if (func_get_args() > 0) {
            $this->setValue($instance);
            return $this;
        }

        return $this->getValue();
    }

    public function getLabel() {
        if (!isset($this->label)) {
            $this->label = new Statistic\Label();
        }

        return $this->label;
    }

    public function setLabel($instance) {
        if ($instance instanceof HasAttribute OR $instance instanceof Appendable) {
            $this->label = $instance;
        } else {
            $this->label = new Statistic\Label($instance);
        }
    }

    public function unsetLabel() {
        $tmp = $this->getLabel();
        unset($this->label);
        $this->getLabel();
        return $tmp;
    }

    public function label($instance = FALSE) {
        if (func_get_args() > 0) {
            $this->setLabel($instance);
            return $this;
        }

        return $this->getLabel();
    }

}
