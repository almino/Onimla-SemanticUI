<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Component;

class Segments extends Component {
    
    const CLASS_NAME = 'segments';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

}
