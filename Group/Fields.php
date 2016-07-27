<?php

namespace Onimla\SemanticUI\Group;

use Onimla\HTML\Element;

class Fields extends Element {

    const CLASS_NAME = 'fields';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

}
