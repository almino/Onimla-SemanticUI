<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Selection {

    public function setSelection() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::LYST)) {
            $method = 'before';
            $search = Constant::LYST;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::SELECTION));
    }

    public function unsetSelection() {
        $this->removeClass(Constant::SELECTION);
    }

    public function isSelection() {
        return $this->hasClass(Constant::SELECTION);
    }

    public function selection() {
        $this->setSelection();
        return $this;
    }

}
