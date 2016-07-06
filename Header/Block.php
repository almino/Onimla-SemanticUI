<?php

namespace Onimla\SemanticUI\Header;

class Block extends \Onimla\SemanticUI\Header {
    public function __construct($number, $text = FALSE, $class = FALSE) {
        parent::__construct($number, $text, $class);
        $this->block();
    }
}
