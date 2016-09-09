<?php

namespace Onimla\SemanticUI\Form;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Traits\Fluid;
use Onimla\SemanticUI\Traits\Labeled;
use Onimla\HTML\Element;
use Onimla\HTML\Polymorphism\UserInput;

/**
 * @property \Onimla\HTML\Input $field
 */
class Input extends Component implements UserInput {

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
    
    public function id($value = FALSE) {
        if ($value === FALSE) {
            return $this->field()->id();
        }
        
        $this->field()->id($value);
        return $this;
    }

    public function isDisabled() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function disable() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function disabled() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function enable() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function isNotReadOnly() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function isNotRequired() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function isReadOnly() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function isRequired() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function isValueSet() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function name($value = FALSE) {
        if ($value === FALSE) {
            return call_user_func(array($this->field(), __FUNCTION__));
        }

        call_user_func_array(array($this->field(), __FUNCTION__), func_get_args());
        return $this;
    }

    public function readOnly() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function required() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function setDisabled() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function setReadOnly() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function setRequired() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function type($value = FALSE) {
        if ($value === FALSE) {
            returncall_user_func(array($this->field(), __FUNCTION__));
        }

        call_user_func_array(array($this->field(), __FUNCTION__), func_get_args());
        return $this;
    }

    public function unsetDisabled() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function unsetReadOnly() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function unsetRequired() {
        call_user_func(array($this->field(), __FUNCTION__));
    }

    public function value($value = FALSE) {
        if ($value === FALSE) {
            return call_user_func(array($this->field(), __FUNCTION__));
        }

        call_user_func_array(array($this->field(), __FUNCTION__), func_get_args());
        return $this;
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
