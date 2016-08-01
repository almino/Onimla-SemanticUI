<?php

namespace Onimla\SemanticUI\Traits;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Floated {

    private $floated = 'floated';
    private $leftFloated = 'left';
    private $rightFloated = 'right';

    public function unsetFloated() {
        $this->getClassAttribute()->strictRemoveClass($this->leftFloated, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->rightFloated, $this->floated);
    }

    public function setFloated($side) {
        $this->unsetFloated();
        
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Column::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $side, $this->floated));
    }

    private function floatedRegEx($side = FALSE) {
        if ($side === FALSE) {
            $side = implode('|', array($this->leftFloated, $this->rightFloated));
        }
        
        return "/({$side})\s+({$this->floated})/";
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
        
        $this->setFloated($side);
        return $this;
    }

    public function rightFloated() {
        $this->setFloated($this->rightFloated);
    }

}
