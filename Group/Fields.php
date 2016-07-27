<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Group;
use Onimla\SemanticUI\Traits\Quantity;

class Fields extends Group {

    const CLASS_NAME = 'fields';
    
    use Quantity;

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

}
