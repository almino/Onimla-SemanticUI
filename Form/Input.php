<?php

namespace Onimla\SemanticUI\Form;

use Onimla\SemanticUI\Component;
use Onimla\HTML\Element;

/**
 * @property \Onimla\HTML\Input $field
 */
class Input extends Component {

    const CLASS_NAME = 'input';

    public function __construct($name = FALSE, $value = FALSE, $type = 'text') {
        parent::__construct('div');
        $this->getClassAttribute()->append(self::CLASS_NAME);
        $this->input(...func_get_args());
    }

    public function createField() {
        $this->field = new \Onimla\HTML\Input;
        return $this->field;
    }

    public function unsetField() {
        unset($this->field);
    }

    public function removeField() {
        $this->unsetField();
    }

    public function setField($name = FALSE, $value = FALSE, $type = 'text') {
        $this->field = $name instanceof Element ? $name : new \Onimla\HTML\Input(...func_get_args());
    }

    public function field($name = FALSE, $value = FALSE, $type = 'text') {
        if (func_num_args() < 1) {
            return isset($this->field) ? $this->field : $this->createField();
        }

        $this->setField(...func_get_args());
        return $this;
    }

}
