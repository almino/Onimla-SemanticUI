<?php

namespace Onimla\SemanticUI\Header;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Constant;

class Sub extends Element {

    const CLASS_NAME = 'sub';

    public function __construct($text = FALSE, $class = FALSE) {
        parent::__construct('div');
        $this->text($text);
        $this->addClass($class, self::CLASS_NAME, Constant::HEADER);
    }

}
