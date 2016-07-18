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
            return $this->getClassAttribute()->hasAny(Constant::INVERTED, ...$this->colors);
        }

        $this->setColor($color);
        return $this;
    }

    public function setColor($color) {
        $this->unsetColor();
        $this->coloredAddClass($color);
    }

    public function unsetColor() {
        $this->removeClass($this->colors);
    }

    public function setInverted() {
        $this->coloredAddClass(Constant::INVERTED);
    }

    public function unsetInverted() {
        $this->removeClass(Constant::INVERTED);
    }

    public function invert() {
        $this->setInverted();
        return $this;
    }

    private function coloredAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BASIC)) {
            $method = 'before';
            $search = Constant::BASIC;
        }

        if ($this->hasClass(Constant::INVERTED)) {
            $method = 'before';
            $search = Constant::INVERTED;
        }
        
        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

}
