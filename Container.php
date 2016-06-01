<?php

namespace Onimla\SemanticUI;

#require_once substr(__DIR__, 0, strpos(__DIR__, 'Menu')) . 'Component.class.php';

class Container extends \Onimla\SemanticUI\Component {
    public function __construct($children = FALSE, $attr = FALSE) {
        parent::__construct('div', $attr, $children);
        $this->addClass('container');
    }
}
