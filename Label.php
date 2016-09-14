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

    public function getDetail() {
        return isset($this->detail) ? $this->detail : FALSE;
    }

    public function setDetail($text = FALSE) {
        $this->detail = new Label\Detail(...func_get_args());
    }

    public function unsetDetail() {
        unset($this->detail);
    }

    public function hasDetail() {
        return $this->isChild($this->getDetail());
    }

    public function detail($text = FALSE) {
        $text = self::filterChildren(func_get_args());

        if (count($text) < 1) {
            return $this->getDetail();
        }

        $this->setDetail($text);
    }

}
