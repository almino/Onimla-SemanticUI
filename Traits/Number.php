<?php

namespace Onimla\SemanticUI\Traits;

/**
 * NumberFormatter won't work on some OS
 */
trait Number {

    protected $cardinal = array(
        '0' => 'zero',
        '1' => 'one',
        '2' => 'two',
        '3' => 'three',
        '4' => 'four',
        '5' => 'five',
        '6' => 'six',
        '7' => 'seven',
        '8' => 'eight',
        '9' => 'nine',
        '10' => 'ten',
        '11' => 'eleven',
        '12' => 'twelve',
        '13' => 'thirteen',
        '14' => 'fourteen',
        '15' => 'fifteen',
        '16' => 'sixteen',
    );
    protected $ordinal = array(
        '1' => 'first',
        '2' => 'second',
        '3' => 'third',
        '5' => 'fifth',
        '8' => 'eighth',
        '9' => 'ninth',
        '12' => 'twelfth',
    );
    
    protected function cleanNumber($number) {
        return preg_replace('/[^\d]/', '', $number);
    }

    protected function spelledCardinalNumbertoInt($spelledCardinalNumber) {
        return array_search($spelledCardinalNumber, $this->cardinal);
    }

    protected function spellNumber($number) {
        return $this->cardinal[$this->cleanNumber($number)];
    }

    protected function spellOrdinalNumber($number) {
        $number = $this->cleanNumber($number);

        if (key_exists($number, $this->ordinal)) {
            return $this->ordinal[$number];
        }
        
        return $this->spellNumber($number) . 'th';
    }

}
