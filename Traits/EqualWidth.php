<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait EqualWidth {

    public function setEqualWidth() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::EQUAL_WIDTH);
    }

    public function unsetEqualWidth() {
        $this->getClassAttribute()->strictRemoveClass(Constant::EQUAL_WIDTH);
    }

    public function isEqualWidth() {
        return $this->hasClass(Constant::EQUAL_WIDTH);
    }

    public function equalWidth() {
        $this->setEqualWidth();
        return $this;
    }

}
