<?php

namespace Onimla\SemanticUI\Traits;

trait Component {

    public function isComponent() {
        // hasClass? isClass?
    }

    public function setComponent($instance = FALSE) {
        if ($instance === FALSE) {
            $instance = $this;
        }

        $instance->addClass('ui');
    }

    public function unsetComponent($instance = FALSE) {
        if ($instance === FALSE) {
            $instance = $this;
        }

        $instance->removeClass('ui');
    }

    public function state($state) {
        
    }

}
