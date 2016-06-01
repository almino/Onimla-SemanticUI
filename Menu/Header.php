<?php

namespace Onimla\SemanticUI\Menu;

/*
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Element.class.php',
        ));
require_once substr(__DIR__, 0, strpos(__DIR__, 'Menu')) . 'IsItem.trait.php';
 */

class Header extends \Onimla\HTML\Element {

    use \Onimla\SemanticUI\IsItem;

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->addClass('header');
        $this->setItem();
        $this->text($text);
    }

}
