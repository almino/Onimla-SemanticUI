<?php

namespace Onimla\SemanticUI\Traits;

trait Alignment {

    private $aligned = 'aligned';
    private $bottomAlignment = 'bottom';
    private $centerAlignment = 'center';
    private $justifiedAlignment = 'justified';
    private $leftAlignment = 'left';
    private $middleAlignment = 'middle';
    private $rightAlignment = 'right';
    private $topAlignment = 'top';

    private function alignmentAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }

        if ($this->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            call_user_func_array(array($this->getClassAttribute(), 'prepend'), func_get_args());
            return $this;
        }

        if ($this->hasClass(\Onimla\SemanticUI\Icon::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Icon::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    protected function setAlignment($class) {
        $this->removeAlignmentClasses();

        if ($class == $this->justifiedAlignment) {
            return $this->alignmentAddClass($this->justifiedAlignment);
        }

        $this->alignmentAddClass($class, $this->aligned);
    }

    private function removeAlignmentClasses() {
        $this->getClassAttribute()->strictRemoveClass($this->bottomAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->centerAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->justifiedAlignment);
        $this->getClassAttribute()->strictRemoveClass($this->leftAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->middleAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->rightAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->topAlignment, $this->aligned);
    }

    public function bottom() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function center() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function justified() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function left() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function middle() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function right() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function top() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

}
