<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Animated {

    public function setAnimated() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::ITEM)) {
            $method = 'before';
            $search = Constant::ITEM;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }
    
    public function animate() {
        return $this->setAnimated();
    }

    public function unsetAnimated() {
        $this->removeClass(Constant::ANIMATED);
    }

    public function isAnimated() {
        return $this->hasClass(Constant::ANIMATED);
    }

    public function animated() {
        $this->setAnimated();
        return $this;
    }

}
