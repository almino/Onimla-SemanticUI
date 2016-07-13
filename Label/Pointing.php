<?php

namespace Onimla\SemanticUI\Label;

use Onimla\SemanticUI\Label;

class Pointing extends Label {
    public function __construct($element, $text) {
        parent::__construct($element, $text);
        $this->pointing();
    }
}
