<?php

namespace Onimla\SemanticUI\Grid\Stackable;

use Onimla\SemanticUI\Grid\Stackable as BaseGrid;

class EqualWidth extends BaseGrid {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->equalWidth();
    }

}
