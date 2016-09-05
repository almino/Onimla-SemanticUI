<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Animated {

    public function setAnimated() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::ANIMATED);
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
