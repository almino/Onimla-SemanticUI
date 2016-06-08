<?php

namespace Onimla\SemanticUI\Traits;

trait Component {

    public function isComponent() {
        // hasClass? isClass?
    }

    public function setComponent($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->addClass(\Onimla\SemanticUI\Component::CLASS_NAME);
    }

    public function unsetComponent($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->removeClass(\Onimla\SemanticUI\Component::CLASS_NAME);
    }

    public function state($state) {
        
    }

}
