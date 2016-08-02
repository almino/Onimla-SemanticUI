<?php

namespace Onimla\SemanticUI\Menu;

use Onimla\SemanticUI\Menu as BaseMenu;

class Fluid extends BaseMenu {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->setFluid();
    }

}
