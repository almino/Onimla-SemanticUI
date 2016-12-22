<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Labeled
{

    public function setLabeled($position = FALSE)
    {

        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::LABELED));
    }

    public function unsetLabeled($position = FALSE)
    {
        $this->getClassAttribute()->strictRemoveClass($this->getLabeledClasses($position));
    }

    private function labeledRegEx($position = FALSE)
    {
        if ($position === FALSE) {
            $position = implode('|', array(
                Constant::RIGHT,
                Constant::LEFT,
            ));
        }

        return "/({$position})\s+(" . Constant::LABELED . ')/';
    }

    public function getLabeledClasses($position = FALSE)
    {
        $matches = array();

        $this->getClassAttribute()->matchValue($this->labeledRegEx($position), $matches);

        return count($matches) > 1 ? "{$matches[1]} {$matches[2]}" : NULL;
    }

    public function isLabeled($side = FALSE)
    {
        return (bool) $this->getClassAttribute()->matchValue($this->labeledRegEx($side));
    }

    public function isLeftLabeled()
    {
        return $this->isLabeled(Constant::LEFT);
    }

    public function isRightLabeled()
    {
        return $this->isLabeled(Constant::RIGHT);
    }

    public function labeled($position = FALSE)
    {
        $this->setLabeled($position);
        return $this;
    }

    public function leftLabeled()
    {
        return $this->labeled(Constant::LEFT);
    }

    public function rightLabeled()
    {
        return $this->labeled(Constant::RIGHT);
    }

}
