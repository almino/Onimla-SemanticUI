<?php

namespace Onimla\SemanticUI\Traits;

trait Doubling {

    public function doubling() {
        return $this->setDoubling();
    }

    public function setDoubling() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, \Onimla\SemanticUI\Constant::DOUBLING);
        return $this;
    }

    public function unsetDoubling() {
        return $this->removeClass(\Onimla\SemanticUI\Constant::DOUBLING);
    }

}
