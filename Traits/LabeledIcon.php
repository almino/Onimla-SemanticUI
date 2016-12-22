<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait LabeledIcon
{

    public function setLabeledIcon()
    {
        $this->unsetLabeledIcon();
        $this->removeClass(Constant::ICON);
        
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::LABELED, Constant::ICON));
    }

    public function unsetLabeledIcon()
    {
        $this->getClassAttribute()->strictRemoveClass(Constant::LABELED, Constant::ICON);
    }

    public function isLabeledIcon()
    {
        return $this->hasClass(Constant::LABELED, Constant::ICON);
    }

    public function labeledIcon()
    {
        $this->setLabeledIcon();
        return $this;
    }

}
