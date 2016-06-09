<?php

namespace Onimla\SemanticUI;

class Column extends \Onimla\HTML\Element {

    use Traits\Column;

    const CLASS_NAME = 'column';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
    }

    public function size($number) {
        $this->column($number);
        return $this;
    }

}
