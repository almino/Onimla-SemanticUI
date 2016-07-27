<?php

namespace Onimla\SemanticUI\Traits;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Quantity {

    use Number;

    public function setQuantity($number) {
        $this->getClassAttribute()->before(self::CLASS_NAME, $this->spellNumber($number));
    }

    public function unsetQuantity() {
        $this->getClassAttribute()->removeClass(...$this->cardinal);
    }

    public function isQuantitySet() {
        return count($this->getClassAttribute()->hasAny(...$this->cardinal)) > 0;
    }

    public function quantity($number = FALSE) {
        if ($number === FALSE AND $this->isQuantitySet()) {
            return implode(' ', $this->getClassAttribute()->hasAny(...$this->cardinal));
        }
        
        $this->setQuantity();
        return $this;
    }

}
