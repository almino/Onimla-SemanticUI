<?php

namespace Onimla\SemanticUI\Menu;

use Onimla\HTML\Anchor;
use Onimla\SemanticUI\Traits\Active;
use Onimla\SemanticUI\Traits\Colored;
use Onimla\SemanticUI\Traits\Item as tItem;

class Item extends Anchor {

    use Active,
        Colored,
        tItem;

    public function __construct($text = FALSE, $href = FALSE, $title = FALSE) {
        parent::__construct($text, $href, $title);
        $this->setItem();
    }

}
