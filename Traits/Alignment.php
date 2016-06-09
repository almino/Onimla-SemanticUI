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

    private function alignmentAddClassAfter() {
        if ($this->hasClass(\Onimla\SemanticUI\Constant::DOUBLING)) {
            return \Onimla\SemanticUI\Constant::DOUBLING;
        }

        return \Onimla\SemanticUI\Component::CLASS_NAME;
    }

    protected function setAlignment($class, $requireAligned = TRUE) {
        $this->removeAlignmentClasses();

        $this->getClassAttribute()->after($this->alignmentAddClassAfter(), $class);

        if ($requireAligned) {
            $this->getClassAttribute()->after($class, $this->aligned);
        }

        return $this;
    }

    private function removeAlignmentClasses() {
        $classes = array(
            $this->aligned,
            $this->bottomAlignment,
            $this->centerAlignment,
            $this->justifiedAlignment,
            $this->leftAlignment,
            $this->middleAlignment,
            $this->rightAlignment,
            $this->topAlignment,
        );

        $this->removeClass($classes);


        return $this;
    }

    public function bottom() {
        return $this->setAlignment(__FUNCTION__, FALSE);
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
        return $this->setAlignment(__FUNCTION__, FALSE);
    }

    public function right() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function top() {
        return $this->setAlignment(__FUNCTION__, FALSE);
    }

}
