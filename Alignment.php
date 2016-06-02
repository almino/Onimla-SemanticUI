<?php

namespace Onimla\SemanticUI;

trait Alignment {

    protected $right = 'right';
    protected $left = 'left';
    protected $justified = 'justified';
    protected $center = 'center';
    protected $aligned = 'aligned';

    protected function setAlignment($class, $requireAligned = TRUE) {
        $this->removeAlignmentClasses();

        $this->addClass($class);

        if ($requireAligned) {
            $this->addClass($this->aligned);
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

    protected function removeAlignmentClasses() {
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

}
