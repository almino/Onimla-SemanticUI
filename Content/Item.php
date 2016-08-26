<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits\Item as tItem;

class Item extends Element {

    use tItem;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->setItem();
        $this->selfClose(FALSE);
    }

}
