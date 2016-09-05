<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Alignment {

    private function alignmentAddClass($position) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Row::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Row::CLASS_NAME;
        }

        if ($this->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            call_user_func_array(array($this->getClassAttribute(), 'prepend'), func_get_args());
            return $this;
        }

        if ($this->hasClass(\Onimla\SemanticUI\Icon::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Icon::CLASS_NAME;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    protected function setAlignment($position) {
        $this->unsetAlignment();

        if ($position == Constant::JUSTIFIED) {
            return $this->alignmentAddClass(Constant::JUSTIFIED);
        }

        $this->alignmentAddClass($position, Constant::ALIGNED);
    }

    private function alignmentRegEx($position = FALSE) {
        if ($position === FALSE) {
            $position = implode('|', array(
                Constant::BOTTOM,
                Constant::CENTER,
                #Constant::JUSTIFIED,
                Constant::LEFT,
                Constant::MIDDLE,
                Constant::RIGHT,
                Constant::TOP,
            ));
        }

        $justified = '(' . Constant::JUSTIFIED . ')|';

        return '/' . ($position === FALSE ? $justified : NULL) . "({$position})\s+(" . Constant::ALIGNED . ')/';
    }

    public function getAlignmentClasses($position) {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->alignmentRegEx($position), $matches);

        return count($matches) > 1 ? implode(' ', array_slice($matches, 1)) : NULL;
    }

    /*
      private function removeAlignmentClasses() {
      $this->getClassAttribute()->strictRemoveClass($this->bottomAlignment, $this->aligned);
      $this->getClassAttribute()->strictRemoveClass($this->centerAlignment, $this->aligned);
      $this->getClassAttribute()->strictRemoveClass($this->justifiedAlignment);
      $this->getClassAttribute()->strictRemoveClass($this->leftAlignment, $this->aligned);
      $this->getClassAttribute()->strictRemoveClass($this->middleAlignment, $this->aligned);
      $this->getClassAttribute()->strictRemoveClass($this->rightAlignment, $this->aligned);
      $this->getClassAttribute()->strictRemoveClass($this->topAlignment, $this->aligned);
      }
     */

    public function unsetAlignment($position = FALSE) {
        $this->getClassAttribute()->strictRemoveClass($this->getAlignmentClasses($position));
    }

    public function isAligned($position = FALSE) {
        return (bool) $this->getClassAttribute()->matchValue($this->alignmentRegEx($position));
    }

    public function bottom() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isBottomAligned() {
        return $this->isAligned(Constant::BOTTOM);
    }

    public function center() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isCenterAligned() {
        return $this->isAligned(Constant::CENTER);
    }

    public function justified() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isJustified() {
        return $this->isAligned(Constant::JUSTIFIED);
    }

    public function left() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isLeftAligned() {
        return $this->isAligned(Constant::LEFT);
    }

    public function middle() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isMiddleAligned() {
        return $this->isAligned(Constant::MIDDLE);
    }

    public function right() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isRightAligned() {
        return $this->isAligned(Constant::RIGHT);
    }

    public function top() {
        $this->setAlignment(__FUNCTION__);
        return $this;
    }

    public function isTopAligned() {
        return $this->isAligned(Constant::TOP);
    }

}
