<?php

namespace Onimla\SemanticUI\Group\Segments;

use Onimla\SemanticUI\Group\Segments;

class Horizontal extends Segments {
    
    const CLASS_NAME = 'horizontal';

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->getClassAttribute()->before(parent::CLASS_NAME, self::CLASS_NAME);
    }

}
