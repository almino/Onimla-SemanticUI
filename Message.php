<?php

namespace Onimla\SemanticUI;

/**
 * @property \Onimla\HTML\Element $container .ui.message
 * @property \Onimla\HTML\Element $content .content
 * @property Icon $icon .icon
 * @property \Onimla\HTML\Element $header .header
 */
class Message extends \Onimla\HTML\Node implements \Onimla\HTML\HasAttribute, \Onimla\HTML\Appendable {

    use Traits\Component,
        Traits\Colored;

    public function __construct($text = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new \Onimla\HTML\Element('div');
        $this->content = new \Onimla\HTML\Element('div');

        # Atributos ================================================================== #
        $this->setComponent($this->container);
        $this->container->addClass('message');

        $this->content->addClass('content');

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

    public function header($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->header) ? $this->header : FALSE;
        }

        $this->removeHeader();

        if ($text instanceof \Onimla\HTML\Element) {
            $this->header = $text;
        } else {
            # Instâncias ================================================================= #
            $this->header = new \Onimla\HTML\Element('div');

            # Atributos ================================================================== #
            $this->header->addClass('header');

            # Árvore ===================================================================== #
            $this->header->text($text);
        }

        $this->content->prepend($this->header);

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

    public function unsetHeader() {
        return $this->removeHeader();
    }
    
    public function icon($icon = FALSE) {
        if ($icon === FALSE) {
            return isset($this->icon) ? $this->icon : FALSE;
        }

        $this->removeIcon();

        if ($icon instanceof Icon) {
            $this->icon = $icon;
        } else {
            $this->icon = new Icon($icon);
        }
        
        $this->container->addClass('icon', 'message');

        $this->container->prepend($this->icon);

        return $this;
    }

    public function removeIcon() {
        if (isset($this->icon)) {
            $this->container->removeClass('icon');
            $this->container->removeChild($this->icon);
            $icon = $this->icon;
            unset($this->icon);
            return $icon;
        }

        return FALSE;
    }

    public function unsetIcon() {
        return $this->removeIcon();
    }

}
