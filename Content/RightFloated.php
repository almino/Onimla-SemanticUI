<?php

namespace Onimla\SemanticUI\Content;

use Onimla\SemanticUI\Content as BaseContent;
use Onimla\SemanticUI\Constant;

class RightFloated extends BaseContent {

    public function __construct($children = FALSE) {
        parent::__construct(...func_get_args());
    }

    public function setRightFloated() {
        $this->unsetRightFloated();
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::RIGHT, Constant::FLOATED);
    }

    public function unsetRightFloated() {
        $this->getClassAttribute()->strictRemoveClass(Constant::RIGHT, Constant::FLOATED);
    }

    public function isRightFloated() {
        return $this->hasClass(implode(' ', array(Constant::RIGHT, Constant::FLOATED)));
    }

    public function rightFloated() {
        $this->setRightFloated();
        return $this;
    }

}
