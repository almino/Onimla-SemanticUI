<?php

namespace Onimla\SemanticUI\Header;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Icon;

/**
 * @property Icon $icon .icon
 */
class EmphasizedIcon extends Content {

    public function __construct($number = FALSE, $text = FALSE, $icon = FALSE) {
        parent::__construct($number, $text);
        $this->icon($icon);
    }

    protected function addIconClass() {
        $this->header->getClassAttribute()->before(Constant::HEADER, Icon::CLASS_NAME);
        return $this;
    }

    protected function removeIconClass() {
        $this->header->removeClass(Icon::CLASS_NAME);
        return $this;
    }

    public function removeIcon() {
        return $this->unsetIcon();
    }

    public function unsetIcon() {
        if (!isset($this->icon)) {
            return FALSE;
        }

        $icon = $this->icon;

        $this->removeChild($this->icon);
        $this->removeIconClass();

        return $icon;
    }

    public function setIcon($instance) {
        $this->unsetIcon();

        if ($instance instanceof Icon) {
            $this->icon = $instance;
        } else {
            $this->icon = new Icon($instance);
        }

        $this->header->prepend($this->icon);
        $this->addIconClass();
    }

    public function icon($instance = FALSE) {
        if ($instance === FALSE) {
            return isset($this->icon) ? $this->icon : FALSE;
        }

        $this->setIcon($instance);

        return $this;
    }

}
