<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

/**
 * @method \Onimla\HTML\Attribute\Klass getClassAttribute()
 */
trait Icon
{

    public function setIcon()
    {
        $this->unsetIcon();
        $this->removeClass(Constant::ICON);
        $this->getClassAttribute()->strictRemoveClass(Constant::LABELED, Constant::ICON);
        
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::ICON));
    }

    public function unsetIcon()
    {
        $this->getClassAttribute()->removeClass(Constant::ICON);
    }

    public function isIcon()
    {
        return $this->hasClass(Constant::ICON);
    }

    public function icon()
    {
        $this->setIcon();
        return $this;
    }

}
