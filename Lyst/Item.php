<?php

namespace Onimla\SemanticUI\Lyst;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\SemanticUI\Traits\PrependIcon;
use Onimla\SemanticUI\Traits\PrependHeader;
use Onimla\SemanticUI\Content\Item as Container;
use Onimla\SemanticUI\Content;

/**
 * @property \Onimla\SemanticUI\Item $container
 * @property \Onimla\SemanticUI\Content $content
 */
class Item extends Node implements HasAttribute {

    use PrependHeader,
        PrependIcon;

    public function __construct($children = FALSE) {
        parent::__construct();

        $this->container = new Container;
        $this->content = new Content;

        $this->container->content = $this->content;
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
        return $this;
    }

    public function data($key, $value = FALSE, $output = 'encode') {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
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
        if ($id === FALSE) {
            return call_user_func(array($this->container, __FUNCTION__));
        }

        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function matchAttr($attr, $regexOrString, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function matchClass($classes, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeAttr($name) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function removeClass($class) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function removeChildren() {
        return call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
    }

    public function removeChild($grandchildren) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function prepend($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

}
