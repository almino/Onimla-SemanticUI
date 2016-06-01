<?php

namespace Onimla\SemanticUI;

/*
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Element.class.php',
        ));

require_once 'IsComponent.trait.php';
*/


class Component extends \Onimla\HTML\Element {
    use IsComponent;
    public function __construct($name, $attr = FALSE, $children = FALSE) {
        parent::__construct($name, $attr, $children);
        $this->setComponent();
    }
}
