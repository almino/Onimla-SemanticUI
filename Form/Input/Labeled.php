<?php

namespace Onimla\SemanticUI\Form\Input;

use Onimla\SemanticUI\Form\Input;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Label as InputLabel;

class Labeled extends Input {

    public function __construct($label = FALSE, $input = FALSE) {
        parent::__construct($input);
    }

    public function unsetLabel() {
        $this->unsetLabeled();
        unset($this->label);
    }

    public function removeLabel() {
        $this->unsetLabel();
    }

    public function setLabel($label = FALSE, $position = FALSE) {
        $this->setLabeled($position);
        $this->label = $label instanceof Element ? $label : new InputLabel($label);
    }

    public function label($label = FALSE, $position = FALSE) {
        if (func_num_args() < 1) {
            return isset($this->label) ? $this->label : FALSE;
        }

        $this->setLabel(...func_get_args());
        return $this;
    }

    public function setRight() {
        $this->rightLabeled();
    }

    public function unsetRight() {
        $this->unsetLabeled(Constant::RIGHT);
    }

    public function isRight() {
        return $this->isLabeled(Constant::RIGHT);
    }

    public function right() {
        $this->setRight();
        return $this;
    }

}
