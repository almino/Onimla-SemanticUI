<?php

namespace Onimla\SemanticUI\Menu\Item;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Content\Item;
use Onimla\SemanticUI\Content\Header;
use Onimla\SemanticUI\Content\Menu;

class Group extends Item {

    public function __construct($children = FALSE) {
        parent::__construct();
        $this->items(...func_get_args());
    }

    public function each($callableOrMethod, $params = FALSE) {
        $this->items()->each($callableOrMethod, $params);
        return $this;
    }

    /**
     * @param string|Element $text optional
     * @return \Onimla\SemanticUI\Menu\Item|\Onimla\SemanticUI\Content\Header
     */
    public function header($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->header) ? $this->header : FALSE;
        }

        $this->header = $text instanceof Element ? $text : new Header($text);

        return $this;
    }

    public function items($children = FALSE) {
        if (count(self::filterChildren(func_get_args())) < 1) {
            return isset($this->menu) ? $this->menu : FALSE;
        }

        $this->header = func_num_args() == 1 AND $children instanceof Element ? $children : new Menu(...func_get_args());

        return $this;
    }

}
