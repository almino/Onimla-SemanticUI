<?php

namespace Onimla\SemanticUI;

/**
 * @property Header\Sub $sub .sub.header
 */
class Header extends \Onimla\HTML\Heading {

    const CLASS_NAME = 'header';

    use Traits\Alignment,
        Traits\Attached,
        Traits\Component,
        Traits\Colored,
        Traits\Size;

    public function __construct($number, $text = FALSE, $class = FALSE) {
        parent::__construct($number, $text, $class);
        $this->setComponent();
        $this->addClass(self::CLASS_NAME);
    }

    public function dividing() {
        return $this->getClassAttribute()->before(self::CLASS_NAME, __FUNCTION__);
    }

    public function block() {
        return $this->getClassAttribute()->before(self::CLASS_NAME, __FUNCTION__);
    }

    public function sub($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->sub) ? $this->sub : FALSE;
        }

        $this->removeSub();

        if ($text instanceof \Onimla\HTML\Element) {
            $this->sub = $text;
        } else {
            $this->sub = new Header\Sub($text);
        }

        return $this;
    }

    public function removeSub() {
        if (isset($this->sub)) {
            $this->removeChild($this->sub);
        }

        return $this;
    }

}
