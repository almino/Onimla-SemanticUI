<?php

namespace Onimla\SemanticUI\Traits;

trait Column {

    private $column = 'column';
    private $columns = 'columns';
    private $numbers = array(
        'zero',
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
        'ten',
        'eleven',
        'twelve',
        'thirteen',
        'fourteen',
        'fifteen',
        'sixteen',
        'seventeen',
        'eighteen',
        'nineteen',
        'twenty',
    );

    public function column($number, $plural = FALSE) {
        $this->setColumn($number, $plural);
    }

    public function setColumn($number, $plural = FALSE) {
        $classes = array($this->number($number), $this->column);
        
        if ($this->getClassAttribute()->isValueSet()) {
            $this->getClassAttribute()->before($this->columnAddClassBefore(), $classes);
        } else {
            $this->addClass($classes);
        }
        
        return $this;
    }

    public function unsetColumn() {
        $this->removeClass($this->column, $this->columns, $this->numbers);
    }

    protected function number($int) {
        return $this->numbers[(int) $int];
    }

    private function columnAddClassBefore() {
        if ($this->hasClass(\Onimla\SemanticUI\Grid::CLASS_NAME)) {
            return \Onimla\SemanticUI\Grid::CLASS_NAME;
        }

        return self::CLASS_NAME;
    }

}
