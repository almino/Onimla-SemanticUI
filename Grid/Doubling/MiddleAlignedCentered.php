<?php

namespace Onimla\SemanticUI\Grid\Doubling;

use Onimla\SemanticUI\Grid\Doubling as BaseGrid;

class MiddleAlignedCentered extends BaseGrid {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->middle();
        $this->centered();
    }

}
