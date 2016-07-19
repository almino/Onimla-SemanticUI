<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;

class Header extends Element {

    const CLASS_NAME = 'header';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, $children);
        $this->addClass(self::CLASS_NAME);
    }

}
