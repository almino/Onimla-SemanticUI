<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;

class Statistics extends Component {

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(Constant::STATISTICS);
    }

}
