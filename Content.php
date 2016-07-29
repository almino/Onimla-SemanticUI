<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;

class Content extends Element {

    const CLASS_NAME = 'content';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
        $this->selfClose(FALSE);
    }

}
