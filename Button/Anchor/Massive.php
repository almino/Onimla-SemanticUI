<?php

namespace Onimla\SemanticUI\Button\Anchor;

use Onimla\SemanticUI\Button\Anchor as Button;

class Massive extends Button {
    public function __construct($text = FALSE, $href = FALSE, $title = FALSE) {
        parent::__construct($text, $href, $title);
        $this->massive();
    }
}
