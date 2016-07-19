<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;

class Component extends Element {
    
    const CLASS_NAME = 'ui';

    use Traits\Component;

    public function __construct($name = 'div', $attr = FALSE, $children = FALSE) {
        parent::__construct($name, $attr, $children);
        $this->setComponent();
    }

}
