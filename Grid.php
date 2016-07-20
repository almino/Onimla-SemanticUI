<?php

namespace Onimla\SemanticUI;

class Grid extends Component {

    use Traits\Alignment,
        Traits\Column,
        Traits\Doubling,
        Traits\Stackable;

    const CLASS_NAME = 'grid';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->selectorToComment(TRUE);
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

    public function addClass($class) {
        $this->getClassAttribute()->before(self::CLASS_NAME, func_get_args());
    }

    public function centered() {
        $this->getClassAttribute()->before(self::CLASS_NAME, __FUNCTION__);
        return $this;
    }
    
    public function center() {
        return $this->centered();
    }

}
