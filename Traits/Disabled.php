<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Disabled {

    public function setDisabled() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::DISABLED);
    }
    
    public function disable() {
        return $this->setDisabled();
    }

    public function unsetDisabled() {
        $this->removeClass(Constant::DISABLED);
    }
    
    public function enable() {
        $this->unsetDisabled();
    }

    public function isDisabled() {
        return $this->hasClass(Constant::DISABLED);
    }

    public function disabled() {
        $this->setDisabled();
        return $this;
    }

}
