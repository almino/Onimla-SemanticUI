<?php

namespace Onimla\SemanticUI;

class Container extends \Onimla\SemanticUI\Component {

    const CLASS_NAME = 'container';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, ...func_get_args());
        $this->addClass(self::CLASS_NAME);
    }

}
