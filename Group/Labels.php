<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;
use \Onimla\SemanticUI\Traits;

class Labels extends Component {

    use Traits\Colored,
        Traits\Size;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(Constant::STATISTICS);
    }

}
