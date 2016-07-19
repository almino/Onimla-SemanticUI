<?php

namespace Onimla\SemanticUI\Modal\Actions;

use Onimla\SemanticUI\Button;

class Approve extends Button {

    const CLASS_NAME = 'approve';

    public function __construct($text = FALSE, $type = 'button') {
        parent::__construct($text, $type);
        $this->addClass(self::CLASS_NAME);
    }

}
