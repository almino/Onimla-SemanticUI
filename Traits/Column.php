<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Column as tColumn;
use Onimla\SemanticUI\Grid as tGrid;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Column {

    use Number;

    private function columnAddClassBefore() {
        if ($this->hasClass(tGrid::CLASS_NAME)) {
            return tGrid::CLASS_NAME;
        }

        return self::CLASS_NAME;
    }

    public function setColumn($number) {
        $number = $this->cleanNumber($number);

        if ($number > 16) {
            $number = 16;
        }

        if ($number < 1) {
            $number = 1;
        }

        $classes = array($this->spellNumber($number), tColumn::CLASS_NAME);

        if ($this->getClassAttribute()->isValueSet()) {
            $this->getClassAttribute()->before($this->columnAddClassBefore(), $classes);
        } else {
            $this->addClass($classes);
        }
    }

    public function unsetColumn() {
        $this->removeClass($this->column, $this->columns, $this->numbers);
    }

    private function columnRegEx() {
        $quantity = array();

        for ($i = 1; $i <= 16; $i++) {
            $quantity[] = preg_quote($this->spellNumber($i));
        }

        return '/([' . implode('|', $quantity) . '])\s+(' . tColumn::CLASS_NAME . ')/';
    }

    public function isColumnSet() {
        return (bool) $this->getClassAttribute()->matchValue($this->columnRegEx());
    }

    public function getColumnClasses() {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->columnRegEx(), $matches);

        return count($matches) > 1 ? "{$matches[1]} {$matches[2]}" : NULL;
    }

    public function columnQuantity() {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->columnRegEx(), $matches);

        return count($matches) > 1 ? $this->spelledCardinalNumbertoInt($matches[1]) : NULL;
    }

    public function columnQty() {
        return $this->columnQuantity();
    }

    public function columnCount() {
        return $this->columnQuantity();
    }

    /**
     * Get or set the quantity of columns
     * @param integer $number
     * @return self|integer
     */
    public function column($number = FALSE) {
        if ($number === FALSE) {
            return $this->columnQuantity();
        }

        $this->setColumn($number);
        return $this;
    }

}
