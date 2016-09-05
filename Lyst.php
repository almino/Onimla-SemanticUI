<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Traits\Animated;
use Onimla\SemanticUI\Traits\Divided;
use Onimla\SemanticUI\Traits\Lyst as tLyst;
use Onimla\SemanticUI\Traits\Horizontal;
use Onimla\SemanticUI\Traits\Relaxed;
use Onimla\SemanticUI\Traits\Selection;
use Onimla\SemanticUI\Traits\Size;

class Lyst extends Component {

    use Animated,
        Divided,
        Horizontal,
        tLyst,
        Relaxed,
        Selection,
        Size;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->setList();
    }

}
