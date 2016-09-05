<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Floated {

    public function unsetFloated() {
        $this->getClassAttribute()->strictRemoveClass(Constant::LEFT, Constant::FLOATED);
        $this->getClassAttribute()->strictRemoveClass(Constant::RIGHT, constant::floated);
    }

    public function setFloated($side) {
        $this->unsetFloated();

        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Column::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $side, Constant::FLOATED));
    }

    private function floatedRegEx($side = FALSE) {
        if ($side === FALSE) {
            $side = implode('|', array(Constant::LEFT, Constant::RIGHT));
        }

        return "/({$side})\s+(" . Constant::FLOATED . ')/';
    }

    public function getFloatedClasses() {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->floatedRegEx(), $matches);

        return count($matches) > 1 ? "{$matches[1]} {$matches[2]}" : NULL;
    }

    public function isFloated($side = FALSE) {
        return (bool) $this->getClassAttribute()->matchValue($this->floatedRegEx($side));
    }

    public function leftFloated() {
        $this->setFloated(Constant::LEFT);
    }

    public function floated($side = FALSE) {
        if ($side === FALSE) {
            return $this->isFloated();
        }

        $this->setFloated($side);
        return $this;
    }

    public function rightFloated() {
        $this->setFloated(Constant::RIGHT);
    }

}
