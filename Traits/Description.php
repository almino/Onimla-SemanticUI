<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Description {

    public function setDescription() {
        $this->addClass(Constant::DESCRIPTION);
    }

    public function unsetDescription() {
        $this->removeClass(Constant::DESCRIPTION);
    }

    public function isDescription() {
        return $this->hasClass(Constant::DESCRIPTION);
    }

    public function description() {
        $this->setDescription();
        return $this;
    }

}
