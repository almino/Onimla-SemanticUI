<?php

namespace Onimla\SemanticUI;

class Row extends \Onimla\HTML\Element {

    use Traits\Colored,
        Traits\Alignment,
        Traits\Column;
    
    const CLASS_NAME = 'row';


    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, $children);
        $this->addClass(self::CLASS_NAME);
    }
}
