<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Pointing {

    public function setPointing() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::POINTING);
    }

    public function unsetPointing() {
        $this->removeClass(Constant::POINTING);
    }

    public function isPointing() {
        return $this->hasClass(Constant::POINTING);
    }

    public function pointing() {
        $this->setPointing();
        return $this;
    }

}
