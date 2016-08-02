<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Segment as tSegment;
use Onimla\SemanticUI\Menu as tMenu;

trait Vertical {

    public function setVertical() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(tSegment::CLASS_NAME)) {
            $method = 'before';
            $search = tSegment::CLASS_NAME;
        }

        if ($this->hasClass(tMenu::CLASS_NAME)) {
            $method = 'before';
            $search = tMenu::CLASS_NAME;
        }
        
        if (method_exists($this, 'isPointing') AND $this->isPointing()) {
            $method = 'before';
            $search = Constant::POINTING;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    public function unsetVertical() {
        $this->removeClass(Constant::VERTICAL);
    }

    public function isVertical() {
        return $this->hasClass(Constant::VERTICAL);
    }

    public function vertical() {
        $this->setVertical();
        return $this;
    }

}
