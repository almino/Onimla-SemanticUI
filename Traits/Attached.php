<?php

namespace Onimla\SemanticUI\Traits;

class Attached {

    private $top = 'top';
    private $attached = 'attached';
    private $bottom = 'bottom';

    protected function setAttached($class, $requireAttached = TRUE) {
        $this->removeAttachedClasses();

        $this->getClassAttribute()->before($this->addClassAfter(), $class);

        if ($requireAligned) {
            $this->getClassAttribute()->after($class, $this->attached);
        }

        return $this;
    }

    public function topAttached() {
        $this->setAttached($this->top, TRUE);
    }

    public function attached() {
        $this->setAttached($this->attached, TRUE);
    }

    public function bottomAttached() {
        $this->setAttached($this->bottom, TRUE);
    }

    private function removeAlignmentClasses() {
        $classes = array(
            $this->top,
            $this->bottom,
            $this->attached,
        );

        $this->removeClass($classes);


        return $this;
    }

    private function attachedAddClassBefore() {
        /*
          if ($this->hasClass(\Onimla\SemanticUI\Constant::DOUBLING)) {
          return \Onimla\SemanticUI\Constant::DOUBLING;
          }
         */

        return \Onimla\SemanticUI\Segment::CLASS_NAME;
    }

}
