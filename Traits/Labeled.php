<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Labeled {

    public function setLabeled($position = FALSE) {
        $this->getClassAttribute()->before(self::CLASS_NAME, $position, Constant::LABELED);
    }

    public function unsetLabeled() {
        $this->getClassAttribute()->strictRemoveClass(Constant::LEFT, Constant::LABELED);
        $this->getClassAttribute()->strictRemoveClass(Constant::RIGHT, Constant::LABELED);
        $this->removeClass(Constant::LABELED);
    }

    public function isLabeled() {
        return $this->hasClass(Constant::LABELED);
    }

    public function labeled($position = FALSE) {
        $this->setLabeled($position);
        return $this;
    }

}
