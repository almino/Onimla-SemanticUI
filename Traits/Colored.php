<?php

namespace Onimla\SemanticUI\Traits;

trait Colored {

    public function color($color = FALSE) {
        if ($color === FALSE) {
            
        }

        $colors = array(
            'red',
            'orange',
            'yellow',
            'olive',
            'green',
            'teal',
            'blue',
            'violet',
            'purple',
            'pink',
            'brown',
            'grey',
            'black',
        );

        $this->removeClass($colors);
        $this->addClass($color);
    }

    public function setInverted() {
        return $this->addClass('inverted');
    }

    public function unsetInverted() {
        return $this->removeClass('inverted');
    }

    public function invert() {
        return $this->setInverted();
    }

}
