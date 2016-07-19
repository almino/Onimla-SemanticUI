<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;

class Header extends Element {

    const CLASS_NAME = 'header';

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->addClass(self::CLASS_NAME);
        $this->text(...func_get_args());
    }

}
