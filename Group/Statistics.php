<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;
use \Onimla\SemanticUI\Traits;

class Statistics extends Component {

    use Traits\Floated,
        Traits\Quantity,
        Traits\Size;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(Constant::STATISTICS);
    }

}
