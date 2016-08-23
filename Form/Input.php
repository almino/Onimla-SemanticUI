<?php

namespace Onimla\SemanticUI\Form;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Traits\Fluid;
use Onimla\SemanticUI\Traits\Labeled;
use Onimla\HTML\Element;

/**
 * @property \Onimla\HTML\Input $field
 */
class Input extends Component {

    use Fluid,
        Labeled;

    const CLASS_NAME = 'input';

    /**
     * @param string|\Onimla\HTML\Element $name optional
     * @param string $value optional
     * @param string $type optional
     */
    public function __construct($name = FALSE, $value = FALSE, $type = 'text') {
        parent::__construct('div');
        $this->getClassAttribute()->append(self::CLASS_NAME);
        $this->field(...func_get_args());
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

    /**
     * @param string|\Onimla\HTML\Element $name optional
     * @param string $value optional
     * @param string $type optional
     * @return \Onimla\SemanticUI\Form\Input
     */
    public function field($name = FALSE, $value = FALSE, $type = 'text') {
        if (func_num_args() < 1) {
            return isset($this->field) ? $this->field : $this->createField();
        }

        $this->setField(...func_get_args());
        return $this;
    }

}
