<?php

namespace Onimla\SemanticUI\Form;

use Onimla\HTML\Select;
use Onimla\SemanticUI\Constant;

class Dropdown extends Select {

    use \Onimla\SemanticUI\Traits\Component;

    public function __construct($name, $options = FALSE) {
        parent::__construct($name, $options);
        $this->setComponent();
        $this->addClass(Constant::DROPDOWN);
    }

    public function isSearchable() {
        return $this->hasClass(Constant::SEARCH);
    }

    public function setSearchable() {
        $this->getClassAttribute()->before(Constant::DROPDOWN, Constant::SEARCH);
    }

    public function unsetSearchable() {
        $this->removeClass(Constant::SEARCH);
    }

    public function searchable() {
        $this->setSearchable();
        return $this;
    }

}
