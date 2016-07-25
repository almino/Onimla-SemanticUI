<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Row;

trait Doubling {

    public function doubling() {
        $this->setDoubling();
        return $this;
    }

    public function setDoubling() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Row::CLASS_NAME)) {
            $method = 'before';
            $search = Row::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::DOUBLING));
    }

    public function unsetDoubling() {
        $this->removeClass(Constant::DOUBLING);
    }

}
