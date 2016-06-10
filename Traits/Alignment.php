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
        
        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $class));

        return $this;
    }

    protected function setAlignment($class, $requireAligned = TRUE) {
        $this->removeAlignmentClasses();

        $this->alignmentAddClass($class);

        if ($requireAligned) {
            $this->getClassAttribute()->after($class, $this->aligned);
        }

        return $this;
    }

    private function removeAlignmentClasses() {
        $this->getClassAttribute()->strictRemoveClass($this->bottomAlignment, $this->aligned);
        $this->getClassAttribute()->strictRemoveClass($this->centerAlignment, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->justifiedAlignment);
        $this->getClassAttribute()->strictRemoveClass($this->leftAlignment, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->middleAlignment, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->rightAlignment, $this->floated);
        $this->getClassAttribute()->strictRemoveClass($this->topAlignment, $this->floated);
    }

    public function bottom() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function center() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function justified() {
        return $this->setAlignment(__FUNCTION__, FALSE);
    }

    public function left() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function middle() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function right() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function top() {
        return $this->setAlignment(__FUNCTION__);
    }

}
