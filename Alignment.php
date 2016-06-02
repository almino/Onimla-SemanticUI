<?php

namespace Onimla\SemanticUI;

trait Alignment {

    protected $right = 'right';
    protected $left = 'left';
    protected $justified = 'justified';
    protected $center = 'center';
    protected $aligned = 'aligned';

    protected function setAlignment($option, $requireAligned = TRUE) {
        $this->removeAlignmentClasses();

        $this->addClass($this->$option);

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
        foreach (get_object_vars($this) as $option) {
            $this->removeClass($this->$option);
        }

        return $this;
    }

}
