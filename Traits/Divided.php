<?php

namespace Onimla\SemanticUI\Traits;

trait Divided {

    private $divided = 'divided';

    protected function setDivided($class, $requireDivided = TRUE) {
        $this->getClassAttribute()->before($this->dividedAddClassBefore(), $class);

        return $this;
    }

    protected function unsetDivided($class, $requireDivided = TRUE) {
        return $this->removeDividedClasses();
    }

    public function attached() {
        return $this->setDivided($this->divided, TRUE);
    }

    private function removeDividedClasses() {
        $this->removeClass($this->divided);

        return $this;
    }

    private function dividedAddClassBefore() {
        return self::CLASS_NAME;
    }

}
