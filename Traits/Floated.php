<?php

namespace Onimla\SemanticUI\Traits;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Floated {

    private $floated = 'floated';
    private $leftFloated = 'left';
    private $rightFloated = 'right';

    private function floatedAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Column::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

    protected function unsetFloated() {
        $this->removeFloatedClasses();
    }

    protected function setFloated($class) {
        $this->removeFloatedClasses();

        $this->floatedAddClass($class, $this->floated);

        #$this->getClassAttribute()->after($class, $this->floated);

        return $this;
    }

    private function floatedRegEx($side = FALSE) {
        if ($side === FALSE) {
            $side = implode('|', array($this->leftFloated, $this->rightFloated));
        }
        
        return "/([{$side}])\s+(" . $this->floated . ')/';
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
        $this->setFloated($this->leftFloated);
    }

    public function floated($side = FALSE) {
        if ($side === FALSE) {
            return $this->isFloated();
        }
        
        $this->setFloated($this->floated);
        return $this;
    }

    public function rightFloated() {
        $this->setFloated($this->rightFloated);
    }

    private function removeFloatedClasses() {
        $this->getClassAttribute()->strictRemoveClass($this->leftFloated, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->rightFloated, $this->floated);

        return $this;
    }

}
