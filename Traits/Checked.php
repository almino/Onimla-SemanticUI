<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\HTML\Constant;

trait Checked {

    public function setChecked() {
        $this->setChecked();
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::CHECKED);
    }

    public function unsetChecked() {
        $this->removeClass(Constant::CHECKED);
    }

    public function isChecked() {
        return $this->hasClass(Constant::CHECKED);
    }

    public function checked() {
        return $this;
    }
    
    public function check() {
        $this->setChecked();
    }
    
    public function uncheck() {
        $this->unsetChecked();
    }

}
