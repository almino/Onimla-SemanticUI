<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Relaxed {

    public function setRelaxed() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::LYST)) {
            $method = 'before';
            $search = Constant::LYST;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::RELAXED));
    }

    public function unsetRelaxed() {
        $this->removeClass(Constant::RELAXED);
    }

    public function isRelaxed() {
        return $this->hasClass(Constant::RELAXED);
    }

    public function relaxed() {
        $this->setRelaxed();
        return $this;
    }

}
