<?php

namespace Onimla\SemanticUI;

class Row extends \Onimla\HTML\Element {

    use Traits\Colored,
        Traits\Alignment,
        Traits\Column,
        Traits\Divided;
    
    const CLASS_NAME = 'row';


    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
    }
}
