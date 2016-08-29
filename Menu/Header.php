<?php

namespace Onimla\SemanticUI\Menu;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits\Item as tItem;
use Onimla\SemanticUI\Constant;

/**
 * A menu item may itself be a header
 */
class Header extends Element {

    use tItem;

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->setItem();
        $this->getClassAttribute()->before(Constant::ITEM, Constant::HEADER);
        $this->text(...func_get_args());
    }

}
