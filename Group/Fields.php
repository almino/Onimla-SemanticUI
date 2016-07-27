<?php

namespace Onimla\SemanticUI\Group;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits\Quantity;

class Fields extends Element {

    const CLASS_NAME = 'fields';
    
    use Quantity;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

}
