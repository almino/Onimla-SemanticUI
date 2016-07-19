<?php

namespace Onimla\SemanticUI\Header;

use Onimla\SemanticUI\Icon;

/**
 * @property Icon $icon .icon
 */
class EmphasizedIcon extends Content {

    public function __construct($number = FALSE, $text = FALSE, $icon = FALSE) {
        parent::__construct($number, $text);
        $this->setIcon($instance);
    }
    
    public function removeIcon() {
        return $this->unsetIcon();
    }

    public function unsetIcon() {
        if ($this->icon === NULL) {
            return FALSE;
        }
        
        $this->removeChild($this->icon);

        $icon = $this->icon;
        $this->icon = NULL;

        return $icon;
    }

    public function setIcon($instance) {
        if ($instance instanceof Icon) {
            $this->icon = $instance;
        } else {
            $this->icon = new Icon($instance);
        }

        $this->unsetIcon();
        $this->prepend($this->icon);
    }

    public function icon($instance = FALSE) {
        if ($instance === FALSE) {
            return $this->icon instanceof Icon ? $this->icon : FALSE;
        }

        $this->setIcon($instance);

        return $this;
    }

}
