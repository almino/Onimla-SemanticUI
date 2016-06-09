<?php

namespace Onimla\SemanticUI\Traits;

trait Stackable {

    public function stackable() {
        return $this->setStackable();
    }

    public function setStackable() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, \Onimla\SemanticUI\Constant::STACKABLE);
        return $this;
    }

    public function unsetStackable() {
        return $this->removeClass(\Onimla\SemanticUI\Constant::STACKABLE);
    }
    
}
