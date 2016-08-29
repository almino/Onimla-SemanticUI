<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Horizontal {

    public function setHorizontal() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::LYST)) {
            $method = 'before';
            $search = Constant::LYST;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::HORIZONTAL));
    }

    public function unsetHorizontal() {
        $this->removeClass(Constant::HORIZONTAL);
    }

    public function isHorizontal() {
        return $this->hasClass(Constant::HORIZONTAL);
    }

    public function horizontal() {
        $this->setHorizontal();
        return $this;
    }

}
