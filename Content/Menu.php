<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Constant;

class Menu extends Element {

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, ...func_get_args());
        $this->addClass(Constant::MENU);
        $this->selfClose(FALSE);
    }

}
