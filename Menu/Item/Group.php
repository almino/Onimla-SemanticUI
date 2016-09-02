<?php

namespace Onimla\SemanticUI\Menu\Item;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Content\Item;
use Onimla\SemanticUI\Content\Header;
use Onimla\SemanticUI\Content\Menu;

class Group extends Item {

    protected $header = NULL;
    protected $menu = NULL;

    public function __construct($children = FALSE) {
        parent::__construct();
        $this->items(...func_get_args());
        $this->role('menu');
    }

    public function __get($name) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
    }

    public function __set($name, $value) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
    }

    public function __unset($name) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
    }

    public function __isset($name) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
    }

    public function count() {
        return $this->items()->count();
    }

    public function each($callableOrMethod, $params = FALSE) {
        $this->items()->each(...func_get_args());
        return $this;
    }

    public function isChild($child) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
    }

    public function prepend($children) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->items(), __FUNCTION__), func_get_args());
        return $this;
    }

    public function unsetHeader() {
        parent::removeChild($this->header);
        $this->header = NULL;
    }

    public function setHeader($text = FALSE) {
        $this->unsetHeader();
        $this->header = $text instanceof Element ? $text : new Header($text);
        $this->unshiftChildren($this->header);
    }

    public function isHeaderSet() {
        return $this->header instanceof Element AND parent::isChild($this->header);
    }

    /**
     * @param string|Element $text optional
     * @return \Onimla\SemanticUI\Menu\Item|\Onimla\SemanticUI\Content\Header
     */
    public function header($text = FALSE) {
        if ($text === FALSE) {
            if (!$this->isHeaderSet()) {
                $this->setHeader();
            }

            return $this->header;
        }

        $this->setHeader($text);

        return $this;
    }

    public function items($children = FALSE) {
        if (!isset($this->menu)) {
            $this->menu = new Menu;
            parent::addChildren($this->menu);
        }

        if (count(self::filterChildren(func_get_args())) < 1) {
            return $this->menu;
        }

        if (func_num_args() == 1 AND $children instanceof Element) {
            parent::removeChild($this->menu);
            $this->menu = $children;
            parent::addChildren($this->menu);
        } else {
            $this->append(...func_get_args());
        }

        return $this;
    }

    public function unsetActive() {
        foreach ($this->items() as $item) {
            call_user_func(array($item, __FUNCTION__));
        }
    }

}
