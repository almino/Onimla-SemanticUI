<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;
use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Content;
use Onimla\SemanticUI\Content\Header as ModalHeader;
use Onimla\SemanticUI\Content\Actions as ModalActions;

/**
 * @property Element $container .ui.message
 * @property Content $content .content
 * @property Icon $icon .icon
 * @property Element $header .header
 * @property Dismiss $dismiss .close.icon
 */
class Modal extends Node implements HasAttribute, Appendable {

    const CLASS_NAME = 'modal';

    protected $sizes = array('small', 'large');

    public function __construct($id = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new Component;
        $this->content = new Content;

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);
        $this->container->id($id);

        # Árvore ===================================================================== #
        $this->container->append($this->content);
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeAttr($name) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function getClassAttribute() {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function addClass($class) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeClass($class) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function id($value = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function data($key, $value = FALSE, $output = 'encode') {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
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

    public function setSize($size) {
        $this->unsetSize();
        $this->container->getClassAttribute()->before(self::CLASS_NAME, $size);
    }

    public function unsetSize() {
        $this->container->removeClass($this->sizes);
    }

    public function isSize() {
        return $this->container->getClassAttribute()->matchValue(implode('|', $this->sizes));
    }

    public function size($size = FALSE) {
        if ($size === FALSE) {
            return $this->container->getClassAttribute()->hasAny(...$this->sizes);
        }

        $this->setSize($size);
        return $this;
    }

    public function small() {
        return $this->size(__FUNCTION__);
    }

    public function large() {
        return $this->size(__FUNCTION__);
    }

    public function prepend($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function header($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->header) ? $this->header : FALSE;
        }

        $this->setHeader($text);

        return $this;
    }

    public function removeHeader() {
        if (isset($this->header)) {
            $this->container->removeChild($this->header);
            $header = $this->header;
            unset($this->header);
            return $header;
        }

        return FALSE;
    }

    public function setHeader($text) {
        $this->removeHeader();

        $this->header = ($text instanceof Element) ? $text : new ModalHeader($text);

        $this->container->prepend($this->header);
    }

    public function unsetHeader() {
        return $this->removeHeader();
    }

    public function appendText($text) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
    }

    public function text($string = FALSE) {
        $params = self::filterChildren(func_get_args());

        if (count($params) < 1) {
            return $this->container->text();
        }

        $this->removeContent();

        foreach ($params as $text) {
            if (!$text instanceof Node) {
                $text = new \Onimla\HTML\Paragraph($text);
            }

            $this->content->append($text);
        }

        return $this;
    }

    /**
     * @return \Onimla\SemanticUI\Content;
     */
    public function getContent() {
        return $this->content;
    }

    public function removeContent() {
        return $this->content->removeChildren();
    }

    /**
     * 
     * @param mixed $children
     * @return \Onimla\SemanticUI\Content\Actions|\Onimla\SemanticUI\Modal|bool
     */
    public function actions($children = FALSE) {
        if (count(self::filterChildren(func_get_args())) < 1) {
            if (!isset($this->actions)) {
                $this->setActions(func_get_args());
            }

            return $this->actions;
        }

        $this->setActions(func_get_args());

        return $this;
    }

    public function removeActions() {
        if (isset($this->actions)) {
            $this->container->removeChild($this->actions);
            $actions = $this->actions;
            unset($this->actions);
            return $actions;
        }

        return FALSE;
    }

    public function setActions($children) {
        $this->removeActions();

        if ($children instanceof ModalActions) {
            $this->actions = $children;
        } else {
            $this->actions = new ModalActions(...func_get_args());
        }

        $this->container->append($this->actions);
    }

    public function unsetActions() {
        return $this->removeActions();
    }

}
