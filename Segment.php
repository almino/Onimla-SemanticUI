<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Constant;

/**
 * A segment is used to create a grouping of related content
 */
class Segment extends Component {

    use Traits\Alignment,
        Traits\Attached,
        Traits\Colored;

    const CLASS_NAME = 'segment';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }
    
    public function addClass($class) {
        $this->getClassAttribute()->before(self::CLASS_NAME, ...func_get_args());
    }
    
    public function setVertical() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::VERTICAL);
    }

    public function unsetVertical() {
        $this->removeClass(Constant::VERTICAL);
    }

    public function isVertical() {
        return $this->hasClass(Constant::VERTICAL);
    }

    public function vertical() {
        $this->setVertical();
    }
    
    public function setRaised() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::RAISED);
    }

    public function unsetRaised() {
        $this->removeClass(Constant::RAISED);
    }

    public function isRaised() {
        return $this->hasClass(Constant::RAISED);
    }

    public function raised() {
        $this->setRaised();
        return $this;
    }
    
    public function setCircular() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::CIRCULAR);
    }

    public function unsetCircular() {
        $this->removeClass(Constant::CIRCULAR);
    }

    public function isCircular() {
        return $this->hasClass(Constant::CIRCULAR);
    }

    public function circular() {
        $this->setCircular();
        return $this;
    }

}
