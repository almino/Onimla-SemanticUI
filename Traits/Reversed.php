<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Reversed {

    public function setReversed($device) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }
        
        if (method_exists($this, 'getColumnClasses') AND strlen($this->getColumnClasses()) > 0) {
            $method = 'before';
            $search = $this->getColumnClasses();
        }
        
        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $device, Constant::REVERSED));
    }

    public function unsetReversed() {
        $this->removeClass(Constant::REVERSED);
    }

    private function getReversedRegex($device = FALSE) {
        if ($device === FALSE) {
            return '[' . implode('|', array(
                Constant::COMPUTER,
                Constant::TABLET,
                Constant::MOBILE,
            )) . ']';
        }
        return "/{$device}\s+" . Constant::REVERSED . '/';
    }

    public function isComputerReversed() {
        return $this->getClassAttribute()->matchValue($this->getReversedRegex(Constant::COMPUTER));
    }

    public function isTabletReversed() {
        return $this->getClassAttribute()->matchValue($this->getReversedRegex(Constant::TABLET));
    }

    public function isMobileReversed() {
        return $this->getClassAttribute()->matchValue($this->getReversedRegex(Constant::MOBILE));
    }

    public function isReversed() {
        return $this->getClassAttribute()->matchValue($this->getReversedRegex());
    }

    public function computerReversed() {
        $this->setReversed(Constant::COMPUTER);
        return $this;
    }

    public function tabletReversed() {
        $this->setReversed(Constant::TABLET);
        return $this;
    }

    public function mobileReversed() {
        $this->setReversed(Constant::MOBILE);
        return $this;
    }

}
