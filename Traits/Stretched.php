<?php

namespace Onimla\SemanticUI\Traits;

trait Stretched {
    private $stretched = 'stretched';

    public function stretched() {
        return $this->setStretched();
    }

    public function setStretched() {
        $this->getClassAttribute()->after(\Onimla\SemanticUI\Component::CLASS_NAME, $this->stretched);
        return $this;
    }

    public function unsetStretched() {
        return $this->removeClass($this->stretched);
    }
    
}
