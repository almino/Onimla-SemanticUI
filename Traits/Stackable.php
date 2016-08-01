<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Stackable {

    public function setStackable() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::STACKABLE));
    }

    public function unsetStackable() {
        $this->removeClass($this->stackable);
    }
    
    public function isStackable() {
        return $this->hasClass(Constant::STACKABLE);
    }

    public function stackable() {
        return $this->setStackable();
    }

}
