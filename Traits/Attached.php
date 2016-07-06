<?php

namespace Onimla\SemanticUI\Traits;

trait Attached {

    private $topAttached = 'top';
    private $attached = 'attached';
    private $bottomAttached = 'bottom';

    protected function setAttached($class, $requireAttached = TRUE) {
        $this->removeAttachedClasses();

        $this->getClassAttribute()->before($this->attachedAddClassBefore(), $class);

        if ($requireAttached) {
            $this->getClassAttribute()->after($class, $this->attached);
        }

        return $this;
    }

    public function topAttached() {
        $this->setAttached($this->topAttached, TRUE);
    }

    public function attached() {
        $this->setAttached($this->attached, TRUE);
    }

    public function bottomAttached() {
        $this->setAttached($this->bottomAttached, TRUE);
    }

    private function removeAttachedClasses() {
        $classes = array(
            $this->topAttached,
            $this->bottomAttached,
            $this->attached,
        );

        $this->removeClass($classes);


        return $this;
    }

    private function attachedAddClassBefore() {
        if ($this->hasClass(\Onimla\SemanticUI\Segment::CLASS_NAME)) {
            return \Onimla\SemanticUI\Segment::CLASS_NAME;
        }
        
        if ($this->hasClass(\Onimla\SemanticUI\Header::CLASS_NAME)) {
            return \Onimla\SemanticUI\Header::CLASS_NAME;
        }

        return self::CLASS_NAME;
    }

}
