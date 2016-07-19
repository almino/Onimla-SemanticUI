<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;

class Actions extends Element {

    const CLASS_NAME = 'actions';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, $children);
        $this->addClass(self::CLASS_NAME);
    }

}
