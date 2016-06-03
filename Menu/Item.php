<?php


namespace Onimla\SemanticUI\Menu;

class Item extends \Onimla\HTML\Anchor {
    
    use \Onimla\SemanticUI\Traits\Item;
    
    public function __construct($text, $title = FALSE) {
        parent::__construct($text, $title);
    }
}
