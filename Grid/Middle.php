<?php
namespace Onimla\SemanticUI\Grid;

use Onimla\SemanticUI\Grid as BaseGrid;

class Middle extends BaseGrid {
    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->middle();
    }
}
