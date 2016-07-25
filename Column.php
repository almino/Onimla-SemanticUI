<?php

namespace Onimla\SemanticUI;

class Column extends \Onimla\HTML\Element {

    use Traits\Alignment,
        Traits\Column,
        Traits\Floated;

    const CLASS_NAME = 'column';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
        $this->selfClose(FALSE);
    }

    public function size($number) {
        $this->column($number);
        return $this;
    }

}
