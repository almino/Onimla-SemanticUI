<?php

namespace Onimla\SemanticUI\Menu;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits\Item;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Header as cHeader;

/**
 * A menu item may itself be a header
 */
class Header extends Element {

    use Item;

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->setItem();
        $this->getClassAttribute()->before(Constant::ITEM, cHeader::CLASS_NAME);
        $this->text(...func_get_args());
    }

}
