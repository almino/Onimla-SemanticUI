<?php

namespace Onimla\SemanticUI\Label\Pointing;

use Onimla\SemanticUI\Label;
use Onimla\SemanticUI\Constant;

class Below extends Label {
    public function __construct($element, $text) {
        parent::__construct($element, $text);
        $this->pointing(Constant::BELOW);
    }
}
