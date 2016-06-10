<?php

namespace Onimla\SemanticUI\Traits;

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

    protected function setFloated($class) {
        $this->removeFloatedClasses();

        $this->floatedAddClass($class, $this->floated);

        #$this->getClassAttribute()->after($class, $this->floated);

        return $this;
    }

    public function leftFloated() {
        $this->setFloated($this->leftFloated);
    }

    public function floated() {
        $this->setFloated($this->floated);
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
