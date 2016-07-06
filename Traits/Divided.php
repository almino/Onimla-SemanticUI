<?php

namespace Onimla\SemanticUI\Traits;

trait Divided {

    private $divided = 'divided';

    protected function setDivided() {
        $this->getClassAttribute()->before($this->dividedAddClassBefore(), $this->divided);

        return $this;
    }

    protected function unsetDivided() {
        return $this->removeDividedClasses();
    }

    public function divided() {
        return $this->setDivided();
    }

    private function removeDividedClasses() {
        $this->removeClass($this->divided);

        return $this;
    }

    private function dividedAddClassBefore() {
        return self::CLASS_NAME;
    }

}
