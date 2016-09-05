<?php

namespace Onimla\SemanticUI\Container;

use Onimla\SemanticUI\Container as BaseContainer;
use Onimla\SemanticUI\Traits\Fluid;

class Text extends BaseContainer {

    use Fluid;

    const CLASS_NAME = 'text';

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->getClassAttribute()->before(parent::CLASS_NAME, self::CLASS_NAME);
    }

}
