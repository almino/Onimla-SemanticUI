<?php

namespace Onimla\SemanticUI\Menu\Item;

use Onimla\SemanticUI\Content\Item;
use Onimla\SemanticUI\Constant;

class Dropdown extends Item
{

    public function __construct($children = FALSE)
    {
        parent::__construct($children);

        $this->getClassAttribute()->before(Constant::ITEM, Constant::DROPDOWN);
    }

}
