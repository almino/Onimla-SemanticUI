<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Colored {

    private $colors = array(
        'red',
        'orange',
        'yellow',
        'olive',
        'green',
        'teal',
        'blue',
        'violet',
        'purple',
        'pink',
        'brown',
        'grey',
        'black',
    );

    public function color($color = FALSE) {
        if ($color === FALSE) {
            return implode(' ', $this->getClassAttribute()->hasAny(Constant::INVERTED, ...$this->colors));
        }

        $this->setColor($color);
        return $this;
    }

    public function setColor($color) {
        $this->unsetColor();
        $this->coloredAddClass($color);
    }

    public function unsetColor() {
        $this->removeClass($this->colors);
    }

    public function setInverted() {
        $this->coloredAddClass(Constant::INVERTED);
    }

    public function unsetInverted() {
        $this->removeClass(Constant::INVERTED);
    }

    public function invert() {
        $this->setInverted();
        return $this;
    }

    private function coloredAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BASIC)) {
            $method = 'before';
            $search = Constant::BASIC;
        }

        if ($this->hasClass(Constant::INVERTED)) {
            $method = 'before';
            $search = Constant::INVERTED;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

    public function red() {
        $this->color(__FUNCTION__);
    }

    public function orange() {
        $this->color(__FUNCTION__);
    }

    public function yellow() {
        $this->color(__FUNCTION__);
    }

    public function olive() {
        $this->color(__FUNCTION__);
    }

    public function green() {
        $this->color(__FUNCTION__);
    }

    public function teal() {
        $this->color(__FUNCTION__);
    }

    public function blue() {
        $this->color(__FUNCTION__);
    }

    public function violet() {
        $this->color(__FUNCTION__);
    }

    public function purple() {
        $this->color(__FUNCTION__);
    }

    public function pink() {
        $this->color(__FUNCTION__);
    }

    public function brown() {
        $this->color(__FUNCTION__);
    }

    public function grey() {
        $this->color(__FUNCTION__);
    }

    public function black() {
        $this->color(__FUNCTION__);
    }

}
