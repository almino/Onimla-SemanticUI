<?php

namespace Onimla\SemanticUI\Traits;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Quantity {

    use Number;

    public function setQuantity($number) {
        $number = $this->cleanNumber($number);

        if ($number > 10) {
            $number = 10;
        }

        if ($number < 2) {
            $number = 2;
        }

        $this->getClassAttribute()->before(self::CLASS_NAME, $this->spellNumber($number));
    }

    public function unsetQuantity() {
        $this->getClassAttribute()->removeClass(...$this->cardinal);
    }

    /**
     * 
     * @return boolean
     */
    public function isQuantitySet() {
        return count($this->getClassAttribute()->hasAny(...$this->cardinal)) > 0;
    }

    /**
     * 
     * @param int $number
     * @return self|string
     */
    public function quantity($number = FALSE) {
        if ($number === FALSE AND $this->isQuantitySet()) {
            return implode(' ', $this->getClassAttribute()->hasAny(...$this->cardinal));
        }

        $this->setQuantity($number);
        return $this;
    }

    /**
     * 
     * @param int $number
     * @return self|string
     */
    public function qty($number = FALSE) {
        return $this->quantity($number);
    }

}
