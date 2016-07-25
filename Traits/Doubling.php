<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Doubling {

    public function doubling() {
        $this->setDoubling();
        return $this;
    }

    public function setDoubling() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, Constant::DOUBLING);
    }

    public function unsetDoubling() {
        $this->removeClass(Constant::DOUBLING);
    }

}
