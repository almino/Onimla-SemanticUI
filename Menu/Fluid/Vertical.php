<?php

namespace Onimla\SemanticUI\Menu\Fluid;

use Onimla\SemanticUI\Menu\Fluid as BaseMenu;

class Vertical extends BaseMenu {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->setVertical();
    }

}
