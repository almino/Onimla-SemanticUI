<?php

namespace Onimla\SemanticUI\Form\Input;

use Onimla\SemanticUI\Form\Input;

class Password extends Input {

    public function __construct($name = FALSE) {
        parent::__construct($name, FALSE, 'password');
    }

    public function __toString() {
        $this->removeAttr('value');
        return parent::__toString();
    }

}
