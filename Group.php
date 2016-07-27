<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;

abstract class Group extends Element {

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->selfClose(FALSE);
    }
}
