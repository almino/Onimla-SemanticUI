<?php

namespace Onimla\SemanticUI\Segment;

use Onimla\SemanticUI\Segment as BaseSegment;

class Basic extends BaseSegment {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
        $this->setBasic();
    }

}
