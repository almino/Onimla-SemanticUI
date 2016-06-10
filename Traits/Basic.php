<?php

namespace Onimla\SemanticUI\Traits;

trait Basic {

    private function basicAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Constant::BUTTON)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

    public function basic() {
        return $this->setBasic();
    }

    public function setBasic() {
        $this->basicAddClass(\Onimla\SemanticUI\Constant::BASIC);
        return $this;
    }

    public function unsetBasic() {
        return $this->removeClass(\Onimla\SemanticUI\Constant::BASIC);
    }

}
