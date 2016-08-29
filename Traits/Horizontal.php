<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Horizontal {

    public function setHorizontal() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::HORIZONTAL);
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
