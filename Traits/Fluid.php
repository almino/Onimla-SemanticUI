<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Form\Input as tInput;

trait Fluid {

    public function unsetFluid() {
        $this->removeClass(Constant::FLUID);
    }

    public function setFluid() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(tInput::CLASS_NAME)) {
            $method = 'before';
            $search = tInput::CLASS_NAME;
        }
        
        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        if ($this->hasClass(Constant::MENU)) {
            $method = 'before';
            $search = Constant::MENU;
        }

        if (method_exists($this, 'isVertical') AND $this->isVertical()) {
            $method = 'before';
            $search = Constant::VERTICAL;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::FLUID));
    }

    public function isFluid() {
        return $this->hasClass(Constant::FLUID);
    }

    public function fluid() {
        $this->setFluid();
        return $this;
    }

}
