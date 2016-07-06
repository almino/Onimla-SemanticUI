<?php

namespace Onimla\SemanticUI\Form;

class Reset extends \Onimla\SemanticUI\Button {

    public function __construct($text = FALSE, $class = FALSE) {
        parent::__construct($text, 'reset');
        call_user_func_array(array($this->getClassAttribute(), 'before'), $class);
    }

}
