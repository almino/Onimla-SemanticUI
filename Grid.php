<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Container;

class Grid extends Component {

    use Traits\Alignment,
        Traits\Column,
        Traits\Doubling,
        Traits\Stackable,
        Traits\Reversed;

    const CLASS_NAME = 'grid';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->selectorToComment(TRUE);
        $this->getClassAttribute()->append(self::CLASS_NAME);
        $this->selfClose(FALSE);
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
    
    public function setContainer() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Container::CLASS_NAME);
    }

    public function unsetContainer() {
        $this->removeClass(Container::CLASS_NAME);
    }

    public function isContainer() {
        return $this->hasClass(Container::CLASS_NAME);
    }

    public function container() {
        $this->setContainer();
        return $this;
    }

}
