<?php

namespace Onimla\SemanticUI\Menu;

#require_once substr(__DIR__, 0, strpos(__DIR__, 'Menu')) . 'Component.class.php';

class Menu extends \Onimla\SemanticUI\Component {

    use \Onimla\SemanticUI\Traits\Colored;

    public function __construct($children = FALSE, $attr = FALSE) {
        parent::__construct('div', $attr, $children);
        $this->addClass('menu');
    }

    public function setFixed() {
        $this->addClass('fixed');
        return $this;
    }

    public function unsetFixed() {
        $this->removeClass('fixed');
        return $this;
    }

    public function fixedOnTop() {
        return $this->setFixed();
    }

}
