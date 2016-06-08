<?php

namespace Onimla\SemanticUI\Traits;

trait Alignment {

    private $right = 'right';
    private $left = 'left';
    private $justified = 'justified';
    private $center = 'center';
    private $aligned = 'aligned';

    protected function setAlignment($class, $requireAligned = TRUE) {
        $this->removeAlignmentClasses();
        
        $this->getClassAttribute()->after($this->alignmentAddClassAfter(), $class);

        if ($requireAligned) {
            $this->getClassAttribute()->after($class, $this->aligned);
        }

        return $this;
    }

    public function right() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function left() {
        return $this->setAlignment(__FUNCTION__);
    }

    public function justified() {
        return $this->setAlignment(__FUNCTION__, FALSE);
    }

    public function center() {
        return $this->setAlignment(__FUNCTION__);
    }

    private function removeAlignmentClasses() {
        $classes = array(
            $this->right,
            $this->left,
            $this->justified,
            $this->center,
            $this->aligned,
        );

        $this->removeClass($classes);


        return $this;
    }
    
    private function alignmentAddClassAfter() {
        if ($this->hasClass(\Onimla\SemanticUI\Constant::DOUBLING)) {
            return \Onimla\SemanticUI\Constant::DOUBLING;
        }
        
        return \Onimla\SemanticUI\Component::CLASS_NAME;
    }

}
