<?php

namespace Onimla\SemanticUI\Content;

use Onimla\HTML\UnorderedList as BaseList;
use Onimla\SemanticUI\Constant;

class UnorderedList extends BaseList {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->addClass(Constant::LYST);
    }

}
