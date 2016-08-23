<?php

namespace Onimla\SemanticUI\Form\Input;

use Onimla\SemanticUI\Form\Input;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Label as InputLabel;

class Labeled extends Input {

    protected $label;

    public function __construct($label = FALSE, $input = FALSE) {
        parent::__construct($input);
        $this->label($label);
    }

    public function unsetLabel() {
        $this->unsetLabeled();
        $this->removeChild($this->label());

        $tmp = $this->label;
        $this->label = NULL;
        return $tmp;
    }

    public function removeLabel() {
        return $this->unsetLabel();
    }

    public function setLabel($label = FALSE, $position = FALSE) {
        $this->unsetLabel();
        $this->setLabeled($position);
        $this->label = (is_object($label) AND method_exists($label, '__toString')) ? $label : new InputLabel('div', $label);


        $method = $this->isRightLabeled() ? 'append' : 'prepend';

        $this->$method($this->label);
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
