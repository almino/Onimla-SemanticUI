<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Attached {

    protected function unsetAttached() {
        $this->getClassAttribute()->strictRemoveClass(Constant::TOP, Constant::ATTACHED);
        $this->getClassAttribute()->strictRemoveClass(Constant::BOTTOM, Constant::ATTACHED);
        $this->removeClass(Constant::ATTACHED);
    }

    protected function setAttached($class, $requireAttached = TRUE) {
        $this->unsetAttached();

        $this->getClassAttribute()->before($this->attachedAddClassBefore(), $class);

        if ($requireAttached) {
            $this->getClassAttribute()->after($class, Constant::ATTACHED);
        }

        return $this;
    }

    public function topAttached() {
        $this->setAttached(Constant::TOP, TRUE);
    }

    public function attached() {
        $this->setAttached(Constant::ATTACHED, TRUE);
    }

    public function bottomAttached() {
        $this->setAttached(Constant::BOTTOM, TRUE);
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
