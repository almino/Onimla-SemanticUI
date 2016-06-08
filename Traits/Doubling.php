<?php

namespace Onimla\SemanticUI\Traits;


class Doubling {

    public function doubling() {
        return $this->setDoubling();
    }
    
    public function setDoubling() {
        $this->getClass()->prepend(\Onimla\SemanticUI\Constant::DOUBLING);
        return $this;
    }
    
    public function unsetDoubling() {
        return $this->removeClass(\Onimla\SemanticUI\Constant::DOUBLING);
    }
}
