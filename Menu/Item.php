<?php

namespace Onimla\SemanticUI\Menu;

use Onimla\HTML\Anchor;
use Onimla\SemanticUI\Traits\Active;
use Onimla\SemanticUI\Traits\Colored;
use Onimla\SemanticUI\Traits\Item;

class Item extends Anchor {

    use Active,
        Colored,
        Item;

    public function __construct($text, $title = FALSE) {
        parent::__construct($text, $title);
    }

}
