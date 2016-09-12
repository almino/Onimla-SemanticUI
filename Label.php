<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Constant;

class Label extends Component {

    const CLASS_NAME = 'label';
    const POINTING = 'pointing';

    use Traits\Basic,
        Traits\Colored,
        Traits\Component;

    public function __construct($element, $text = FALSE) {
        parent::__construct($element);
        $this->addClass(self::CLASS_NAME);
        $this->text($text);
    }

    public function setPointing($position = FALSE) {
        $this->getClassAttribute()->before(self::CLASS_NAME, self::POINTING);

        if ($position == Constant::BELOW) {
            $this->getClassAttribute()->after(self::POINTING, $position);
        } elseif (strlen($position) > 3) {
            $this->getClassAttribute()->before(self::POINTING, $position);
        }
    }

    public function unsetPointing() {
        $this->getClassAttribute()->strictRemoveClass(self::CLASS_NAME, Constant::BELOW);
        $this->getClassAttribute()->strictRemoveClass(Constant::LEFT, self::CLASS_NAME);
        $this->getClassAttribute()->strictRemoveClass(Constant::RIGHT, self::CLASS_NAME);

        return $this;
    }

    public function pointing($position = FALSE) {
        $this->unsetPointing();
        $this->setPointing($position);
        return $this;
    }

}
