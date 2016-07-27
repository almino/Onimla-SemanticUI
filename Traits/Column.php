<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Column as tColumn;
use Onimla\SemanticUI\Grid as tGrid;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Column {

    use Number;

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

    public function column($number, $plural = FALSE) {
        $this->setColumn($number, $plural);
        return $this;
    }

    private function columnAddClassBefore() {
        if ($this->hasClass(tGrid::CLASS_NAME)) {
            return tGrid::CLASS_NAME;
        }

        return self::CLASS_NAME;
    }

}
