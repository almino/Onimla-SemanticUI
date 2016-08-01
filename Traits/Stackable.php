<?php

namespace Onimla\SemanticUI\Traits;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Stackable {

    private $stackable = 'stackable';

    public function stackable() {
        return $this->setStackable();
    }

    public function setStackable() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $this->spellNumber($width), Constant::WIDE, $device));
    }

    public function unsetStackable() {
        $this->removeClass($this->stackable);
    }

}
