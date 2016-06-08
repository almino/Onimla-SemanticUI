<?php

namespace Onimla\SemanticUI;

class Header extends \Onimla\HTML\Heading {

    const CLASS_VALUE = 'header';

    use Traits\Component,
        Traits\Alignment,
        Traits\Colored;

    public function __construct($number, $text = FALSE, $class = FALSE) {
        parent::__construct($number, $text, $class);
        $this->setComponent();
        $this->addClass(self::CLASS_VALUE);
    }

    public function dividing() {
        return $this->getClass()->before(self::CLASS_VALUE, __FUNCTION__);
    }

}
