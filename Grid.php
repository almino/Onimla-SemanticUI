<?php

namespace Onimla\SemanticUI;

class Grid extends Component {

    use Traits\Alignment,
        Traits\Doubling;

    const CLASS_NAME = 'grid';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->selectorToComment(TRUE);
        $this->addClass(self::CLASS_NAME);
    }

}
