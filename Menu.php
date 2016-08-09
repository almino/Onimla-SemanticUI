<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Constant;

class Menu extends Component {

    use Traits\Attached,
        Traits\Colored,
        Traits\Fixed,
        Traits\Fluid,
        Traits\Pointing,
        Traits\Secondary,
        Traits\Vertical;

    public function __construct($children = FALSE) {
        parent::__construct('nav', FALSE, func_get_args());
        $this->addClass(Constant::MENU);
        $this->role('navigation');
    }

}
