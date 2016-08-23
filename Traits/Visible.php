<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Visible {

    public function setVisible() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::VISIBLE);
    }

    public function unsetVisible() {
        $this->removeClass(Constant::VISIBLE);
    }

    public function isVisible() {
        return $this->hasClass(Constant::VISIBLE);
    }

    public function visible() {
        $this->setVisible();
        return $this;
    }

}
