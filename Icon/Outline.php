<?php

namespace Onimla\SemanticUI\Icon;

use Onimla\SemanticUI\Icon;

abstract class Outline extends Icon {

    const CLASS_NAME = 'outline';

    public function __construct($class) {
        parent::__construct(...func_get_args());
        $this->getClassAttribute()->before(Icon::CLASS_NAME, self::CLASS_NAME);
    }

}
