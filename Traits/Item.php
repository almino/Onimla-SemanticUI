<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Item {

    public function setItem() {
        $this->addClass(Constant::ITEM);
    }

    public function unsetItem() {
        $this->removeClass(Constant::ITEM);
    }

    public function isItem() {
        return $this->hasClass(Constant::ITEM);
    }

}
