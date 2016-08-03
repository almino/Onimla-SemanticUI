<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Constant;

class Header extends Element {

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->addClass(Constant::HEADER);
        $this->text(...func_get_args());
        $this->selfClose(FALSE);
    }

}
