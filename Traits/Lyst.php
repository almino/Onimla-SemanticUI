<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Lyst {

    public function setList() {
        $this->setLyst();
    }

    public function setLyst() {
        $this->addClass(Constant::LYST);
    }

    public function unsetList() {
        $this->unsetLyst();
    }

    public function unsetLyst() {
        $this->removeClass(Constant::LYST);
    }

    public function isList() {
        $this->isLyst();
    }

    public function isLyst() {
        return $this->hasClass(Constant::LYST);
    }

    public function lyst() {
        $this->setLyst();
        return $this;
    }

}
