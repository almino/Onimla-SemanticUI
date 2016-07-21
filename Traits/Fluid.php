<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Fluid {

    public function setFluid() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::FLUID);
    }

    public function unsetFluid() {
        $this->removeClass(Constant::FLUID);
    }

    public function isFluid() {
        return $this->hasClass(Constant::FLUID);
    }

    public function fluid() {
        $this->setFluid();
        return $this;
    }

}
