<?php

namespace Onimla\SemanticUI;

class Button extends \Onimla\HTML\Button {

    use Traits\Button;

    public function __construct($text = FALSE, $type = 'button') {
        parent::__construct($text, $type);
        $this->setButton();
    }

}
