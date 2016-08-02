<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\HTML\Attribute\Klass;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Emphasis {

    use Primary,
        Secondary;

    private function removeEmphasisClasses() {
        $this->removeClass(Constant::PRIMARY, Constant::SECONDARY);
    }

    public function removeEmphasis() {
        $this->removeEmphasisClasses();
    }

    private function emphasisAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    public function unsetEmphasis() {
        $this->removeEmphasisClasses();
    }

    public function setEmphasis($class) {
        $this->removeEmphasisClasses();

        $this->emphasisAddClass($class);
    }

    public function getEmphasisClass() {
        return Klass::outputValue($this->getClassAttribute()->hasAny(Constant::PRIMARY, Constant::SECONDARY));
    }

    public function getEmphasis() {
        return $this->getEmphasisClass();
    }

    public function isEmphasized() {
        return $this->getClassAttribute()->matchValue('/' . implode('|', array(Constant::PRIMARY, Constant::SECONDARY)) . '/');
    }

    public function isEmphasisSet() {
        return $this->isEmphasized();
    }

    public function emphasis($class = FALSE) {
        if ($class === FALSE) {
            return $this->getEmphasis();
        }
    }

}
