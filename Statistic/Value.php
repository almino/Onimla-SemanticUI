<?php

namespace Onimla\SemanticUI\Statistic;

use Onimla\HTML\Element;
use Onimla\HTML\Constant;

class Value extends Element {

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->text($text);
        $this->addClass(Constant::VALUE);
    }

}
