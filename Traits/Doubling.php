<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Doubling {

    public function doubling() {
        return $this->setDoubling();
    }

    public function setDoubling() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, Constant::DOUBLING);
        return $this;
    }

    public function unsetDoubling() {
        return $this->removeClass(Constant::DOUBLING);
    }

}
