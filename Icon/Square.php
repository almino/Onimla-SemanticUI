<?php

namespace Onimla\SemanticUI\Icon;

use Onimla\SemanticUI\Icon;

abstract class Square extends Icon {

    const CLASS_NAME = 'square';

    public function __construct($class) {
        parent::__construct($class);
        $this->addClass(self::CLASS_NAME);
    }

}
