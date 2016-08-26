<?php

namespace Onimla\SemanticUI;

use Traits\Lyst as tLyst;

class Lyst extends Component {

    use tLyst;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->setList();
    }

}
