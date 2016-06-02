<?php

namespace Onimla\SemanticUI;

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
    
    public function invert() {
        return $this->addClass('inverted');
    }

}
