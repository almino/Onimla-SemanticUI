<?php

namespace Onimla\SemanticUI\Modal\Actions;

use Onimla\SemanticUI\Button;

class Deny extends Button {

    const CLASS_NAME = 'deny';

    public function __construct($text = FALSE, $type = 'button') {
        parent::__construct($text, $type);
        $this->addClass(self::CLASS_NAME);
    }

}
