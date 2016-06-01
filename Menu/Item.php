<?php


namespace Onimla\SemanticUI\Menu;

class Item extends \Onimla\HTML\Anchor {
    
    use \Onimla\SemanticUI\IsItem;
    
    public function __construct($text, $title = FALSE) {
        parent::__construct($text, $title);
    }
}
