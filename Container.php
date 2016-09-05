<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Traits\Fluid;

class Container extends \Onimla\SemanticUI\Component {

    use Fluid;

    const CLASS_NAME = 'container';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, ...func_get_args());
        $this->addClass(self::CLASS_NAME);
    }

}
