<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Constant;

class Column extends Element {

    use Traits\Alignment,
        Traits\Floated,
        Traits\Number;

    const CLASS_NAME = 'column';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->addClass(self::CLASS_NAME);
        $this->selfClose(FALSE);
    }

    public function setWidth($width, $device = FALSE) {
        $width = $this->cleanNumber($width);

        if ($width > 16) {
            $width = 16;
        }

        if ($width < 1) {
            $width = 1;
        }

        $this->unsetWidth($device);

        $method = 'before';
        $search = self::CLASS_NAME;

        if ($this->isFloated()) {
            $method = 'before';
            $search = $this->getFloatedClasses();
        }

        $isMobileSet = $this->isWidthSet(Constant::MOBILE);
        $isTabletSet = $this->isWidthSet(Constant::TABLET);
        $isComputerSet = $this->isWidthSet(Constant::COMPUTER);

        $isMobileDevice = $device == Constant::MOBILE;
        $isTabletDevice = $device == Constant::TABLET;
        $isComputerDevice = $device == Constant::COMPUTER;

        if ($isComputerSet) {
            $method = 'before';
            $search = $this->getWidthClasses(Constant::COMPUTER);
        }

        if ($isTabletSet AND $isComputerDevice) {
            $method = 'after';
            $search = $this->getWidthClasses(Constant::TABLET);
        }

        if ($isTabletSet AND $isMobileDevice) {
            $method = 'before';
            $search = $this->getWidthClasses(Constant::TABLET);
        }

        if ($isMobileSet AND $isComputerSet) {
            $method = 'before';
            $search = $this->getWidthClasses(Constant::COMPUTER);
        }

        if ($isMobileSet AND $isTabletSet) {
            $method = 'after';
            $search = $this->getWidthClasses(Constant::TABLET);
        }

        #var_dump($this->selector('css'));
        #var_dump($method);
        #var_dump($search);

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $this->spellNumber($width), Constant::WIDE, $device));
        #var_dump($this->selector('css'));
    }

    public function unsetWidth($device = FALSE) {
        if ($device === FALSE) {
            $device = array(
                Constant::COMPUTER,
                Constant::TABLET,
                Constant::MOBILE,
            );
        }

        for ($i = 1; $i <= 16; $i++) {
            $this->getClassAttribute()->strictRemoveClass($this->spellNumber($i), Constant::WIDE, $device);
        }
    }

    private function widthRegEx($device = FALSE) {
        $devices = implode('|', array_map('preg_quote', array(
            Constant::COMPUTER,
            Constant::TABLET,
            Constant::MOBILE,
        )));

        $width = array();

        for ($i = 1; $i <= 16; $i++) {
            $width[] = preg_quote($this->spellNumber($i));
        }

        $regex = '/(' . implode('|', $width) . ')\s+(' . Constant::WIDE . ')';
        $regex .= ($device === FALSE ? "(?!\\s+({$devices}))" : "\\s+({$device})");
        $regex .= '/';

        return $regex;
    }

    public function isWidthSet($device = FALSE) {
        return (bool) $this->getClassAttribute()->matchValue($this->widthRegEx($device));
    }

    public function isWidth($device = FALSE) {
        return $this->isWidthSet($device);
    }

    /**
     * 
     * @param string $device
     * @return string Classes use to define the column's width
     */
    public function getWidthClasses($device = FALSE) {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->widthRegEx($device), $matches);

        return count($matches) > 0 ? trim($matches[0]) : NULL;
    }

    /**
     * 
     * @param string $device
     * @return integer Number representing the column's width
     */
    public function getWidth($device = FALSE) {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->widthRegEx($device), $matches);

        return count($matches) > 1 ? $this->spelledCardinalNumbertoInt($matches[1]) : NULL;
    }

    public function width($width = FALSE, $device = FALSE) {
        if ($width === FALSE) {
            return $this->getWidth($device);
        }

        $this->setWidth($width, $device);
        return $this;
    }
    
    public function mobileWidth($width = FALSE) {
        return $this->width($width, Constant::MOBILE);
    }
    
    public function tabletWidth($width = FALSE) {
        return $this->width($width, Constant::TABLET);
    }
    
    public function computerWidth($width = FALSE) {
        return $this->width($width, Constant::COMPUTER);
    }

}
