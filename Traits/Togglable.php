<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Togglable {

    public function setTogglable() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::TOGGLE);
    }

    public function unsetTogglable() {
        $this->removeClass(Constant::TOGGLE);
    }

    public function isTogglable() {
        return $this->hasClass(Constant::TOGGLE);
    }

    public function togglable() {
        $this->setTogglable();
        return $this;
    }

}
