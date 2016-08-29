<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Traits\Lyst as tLyst;
use Onimla\SemanticUI\Traits\Horizontal;

class Lyst extends Component {

    use Horizontal,
        tLyst;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->setList();
    }

}
