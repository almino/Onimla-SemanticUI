<?php

namespace Onimla\SemanticUI\Menu\Vertical;

use Onimla\SemanticUI\Menu\Vertical as BaseMenu;

class Fluid extends BaseMenu {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->setFluid();
    }

}
