<?php

namespace Onimla\SemanticUI;

class Menu extends Component {

    const CLASS_NAME = 'menu';

    use Traits\Attached,
        Traits\Colored,
        Traits\Fixed,
        Traits\Fluid,
        Traits\Pointing,
        Traits\Secondary,
        Traits\Vertical;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
    }

}
