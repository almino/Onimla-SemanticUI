<?php

namespace Onimla\SemanticUI\Label;

use Onimla\HTML\Element;

class Detail extends Element {

    const CLASS_NAME = 'detail';

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->addClass(self::CLASS_NAME);
        $this->text(...func_get_args());
    }

}
