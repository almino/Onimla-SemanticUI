<?php

namespace Onimla\SemanticUI\Traits;

trait Stackable {

    private $stackable = \Onimla\SemanticUI\Constant::STACKABLE;

    public function stackable() {
        return $this->setStackable();
    }

    public function setStackable() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, $this->stackable);
        return $this;
    }

    public function unsetStackable() {
        return $this->removeClass($this->stackable);
    }

}
