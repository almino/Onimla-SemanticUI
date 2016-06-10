<?php

namespace Onimla\SemanticUI\Traits;

trait Floated {

    private $floated = 'floated';
    private $leftFloated = 'left';
    private $rightFloated = 'right';

    private function floatedAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $class));

        return $this;
    }

    protected function setFloated($class) {
        $this->removeFloatedClasses();

        $this->floatedAddClass($class);

        $this->getClassAttribute()->after($class, $this->floated);

        return $this;
    }

    public function topFloated() {
        $this->setFloated($this->leftFloated);
    }

    public function floated() {
        $this->setFloated($this->floated);
    }

    public function bottomFloated() {
        $this->setFloated($this->rightFloated);
    }

    private function removeFloatedClasses() {
        $classes = array(
            $this->leftFloated,
            $this->rightFloated,
            $this->floated,
        );

        $this->getClassAttribute()->strictRemoveClass($classes);

        return $this;
    }

}
