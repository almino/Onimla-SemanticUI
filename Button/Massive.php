<?php

namespace Onimla\SemanticUI\Button;

use Onimla\SemanticUI\Button;

class Massive extends Button {

    public function __construct($text = FALSE, $type = 'button') {
        parent::__construct($text, $type);
        $this->massive();
    }

}
