<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Label;

trait Basic {

    private function basicAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        if ($this->hasClass(Label::CLASS_NAME)) {
            $method = 'before';
            $search = Label::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

    public function basic() {
        $this->setBasic();
        return $this;
    }

    public function setBasic() {
        $this->basicAddClass(Constant::BASIC);
    }

    public function unsetBasic() {
        $this->removeClass(Constant::BASIC);
    }
    
    public function isBasic() {
        return $this->hasClass(Constant::BASIC);
    }

}
