<?php

namespace Onimla\SemanticUI\Container;

use Onimla\SemanticUI\Container as BaseContainer;

class Text extends BaseContainer {

    const CLASS_NAME = 'text';

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->getClassAttribute()->before(parent::CLASS_NAME, self::CLASS_NAME);
    }

}
