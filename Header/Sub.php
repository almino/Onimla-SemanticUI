<?php

namespace Onimla\SemanticUI\Header;

class Sub extends \Onimla\HTML\Element {

    const CLASS_VALUE = 'sub';

    public function __construct($text = FALSE, $class = FALSE) {
        parent::__construct('div');
        $this->text($text);
        $this->addClass($class, self::CLASS_VALUE, \Onimla\SemanticUI\Header::CLASS_VALUE);
    }

}