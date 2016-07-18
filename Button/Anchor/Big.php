<?php

namespace Onimla\SemanticUI\Button\Anchor;

use Onimla\SemanticUI\Button\Anchor as Button;

class Big extends Button {
    public function __construct($text = FALSE, $href = FALSE, $title = FALSE) {
        parent::__construct($text, $href, $title);
        $this->big();
    }
}
