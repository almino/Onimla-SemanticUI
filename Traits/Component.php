<?php

namespace Onimla\SemanticUI\Traits;

trait Component {

    /**
     * @param \Onimla\HTML\Element $instance
     * @return boolean
     */
    public function isComponent($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        return $instance->hasClass(\Onimla\SemanticUI\Component::CLASS_NAME);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function setComponent($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->getClassAttribute()->prepend(\Onimla\SemanticUI\Component::CLASS_NAME);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function unsetComponent($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->removeClass(\Onimla\SemanticUI\Component::CLASS_NAME);
    }


    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function state($state) {
        
    }

}
