<?php

namespace Onimla\SemanticUI\Grid;

use Onimla\SemanticUI\Grid;

class Stackable extends Grid {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->stackable();
    }

}
