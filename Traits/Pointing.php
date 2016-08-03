<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Pointing {

    public function setPointing() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::MENU)) {
            $method = 'before';
            $search = Constant::MENU;
        }

        /*
          if (method_exists($this, 'isPointing') AND $this->isPointing()) {
          $method = 'before';
          $search = Constant::POINTING;
          }
         */

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::POINTING));
    }

    public function unsetPointing() {
        $this->removeClass(Constant::POINTING);
    }

    public function isPointing() {
        return $this->hasClass(Constant::POINTING);
    }

    public function pointing() {
        $this->setPointing();
        return $this;
    }

}
