<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;
use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Content;
use Onimla\SemanticUI\Content\Header;
use Onimla\SemanticUI\Content\Actions;

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

    public function __construct($children = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new Component;
        $this->content = new Content(...func_get_args());

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

        # Árvore ===================================================================== #
        $this->container->append($this->content);
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
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
            $this->content->removeChild($this->header);
            $header = $this->header;
            unset($this->header);
            return $header;
        }

        return FALSE;
    }

    public function setHeader($text) {
        $this->removeHeader();
        
        if ($text instanceof Element) {
            $this->header = $text;
        } else {
            $this->header = new Header;
            $this->header->text($text);
        }

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

    public function removeContent() {
        return $this->content->removeChildren();
    }
    
    public function setSize($size) {
        $this->unsetSize();
        $this->container->getClassAttribute()->before(self::CLASS_NAME, $size);
    }

    public function unsetSize() {
        $this->removeClass($this->sizes);
    }

    public function isSize() {
        return $this->container->getClassAttribute()->matchValue(implode('|', $this->sizes));
    }

    public function size($size = FALSE) {
        if ($size === FALSE) {
            return $this->container->getClassAttribute()->hasAny(...$this->sizes);
        }
        
        $this->setSize();
        return $this;
    }

}
