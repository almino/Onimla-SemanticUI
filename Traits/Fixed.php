<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Fixed {

    public function unsetFixed($side = FALSE) {
        if ($side === FALSE) {
            $this->getClassAttribute()->strictRemoveClass(Constant::TOP, Constant::FIXED);
            $this->getClassAttribute()->strictRemoveClass(Constant::RIGHT, Constant::FIXED);
            $this->getClassAttribute()->strictRemoveClass(Constant::BOTTOM, Constant::FIXED);
            $this->getClassAttribute()->strictRemoveClass(Constant::LEFT, Constant::FIXED);
        }

        $this->getClassAttribute()->strictRemoveClass($side, Constant::FIXED);
    }

    public function setFixed($side) {
        $this->unsetFixed();

        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::MENU)) {
            $method = 'before';
            $search = Constant::MENU;
        }

        if (method_exists($this, 'isVertical') AND $this->isVertical()) {
            $method = 'before';
            $search = Constant::VERTICAL;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    private function fixedRegEx($side = FALSE) {
        if ($side === FALSE) {
            $side = implode('|', array(
                Constant::TOP,
                Constant::RIGHT,
                Constant::BOTTOM,
                Constant::LEFT,
            ));
        }

        return "/({$side})\s+(" . Constant::FIXED . ')/';
    }

    public function getFixedClass() {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->fixedRegEx(), $matches);

        return count($matches) > 1 ? "{$matches[1]} {$matches[2]}" : NULL;
    }

    public function getFixed() {
        return $this->getFixedClass();
    }

    public function isFixed($side = FALSE) {
        return (bool) $this->getClassAttribute()->matchValue($this->fixedRegEx($side));
    }

    public function fixed($side = FALSE) {
        if ($side === FALSE) {
            return $this->getFixedClass();
        }

        $this->setFixed($side);
        return $this;
    }

}
