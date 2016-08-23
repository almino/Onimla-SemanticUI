<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits;

class Component extends Element {

    const CLASS_NAME = 'ui';

    use Traits\Component,
        Traits\Visible;

    public function __construct($name = 'div', $attr = FALSE, $children = FALSE) {
        parent::__construct($name, $attr, $children);
        $this->setComponent();
        $this->selfClose(FALSE);
    }

}
