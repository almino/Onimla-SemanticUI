<?php

namespace Onimla\SemanticUI\Form\Input;

use Onimla\SemanticUI\Form\Input;
use Onimla\SemanticUI\Icon as Glyph;

/**
 * @property \Onimla\SemanticUI\Icon $icon .icon
 */
class Icon extends Input {

    public function __construct($icon = FALSE, $input = FALSE) {
        parent::__construct($input);
        $this->icon($icon);
    }

    public function unsetIcon() {
        $this->removeClass(Glyph::CLASS_NAME);
        unset($this->icon);
    }

    public function removeIcon() {
        $this->unsetIcon();
    }

    public function setIcon($icon = FALSE) {
        $this->getClassAttribute()->before(self::CLASS_NAME, Glyph::CLASS_NAME);
        $this->icon = $icon instanceof Element ? $icon : new Glyph($icon);
    }

    public function icon($icon = FALSE) {
        if (func_num_args() < 1) {
            return isset($this->icon) ? $this->icon : FALSE;
        }

        $this->setIcon(...func_get_args());
        return $this;
    }

}
