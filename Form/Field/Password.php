<?php

namespace Onimla\SemanticUI\Form\Field;

use Onimla\SemanticUI\Form\Field;

class Password extends Field {

    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct($label, $name, $value);

        $this->input->type('password');
    }

    public function __toString() {
        $this->input->removeAttr('value');
        return parent::__toString();
    }

}
