<?php
namespace Onimla\SemanticUI;


class Header extends \Onimla\HTML\Heading {
    use IsComponent;
    
    public function __construct($number, $text = FALSE, $class = FALSE) {
        parent::__construct($number, $text, $class);
        $this->setComponent();
        $this->addClass('header');
    }
}
