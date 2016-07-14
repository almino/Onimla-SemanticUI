<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Colored {

    private $colors = array(
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

    public function color($color = FALSE) {
        if ($color === FALSE) {
            
        }

        $this->setColor($color);
        return $this;
    }

    public function setColor($color) {
        $this->unsetColor();
        $this->getClassAttribute()->before($this->coloredAddClassBefore(), $color);
    }

    public function unsetColor() {
        $this->removeClass($this->colors);
    }

    public function setInverted() {
        $this->addClass('inverted');
    }

    public function unsetInverted() {
        $this->removeClass('inverted');
    }

    public function invert() {
        $this->setInverted();
        return $this;
    }

    private function coloredAddClassBefore() {
        if ($this->hasClass(Constant::BASIC)) {
            return Constant::BASIC;
        }

        return self::CLASS_NAME;
    }

}
