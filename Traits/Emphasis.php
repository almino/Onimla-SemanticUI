<?php

namespace Onimla\SemanticUI\Traits;

trait Emphasis {
    
    private $primary = 'primary';
    private $secondary = 'secondary';

    private function emphasisAddClass($class) {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(\Onimla\SemanticUI\Constant::BUTTON)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Constant::BUTTON;
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));

        return $this;
    }

    protected function setEmphasis($class) {
        $this->removeEmphasisClasses();

        $this->emphasisAddClass($class);

        return $this;
    }

    public function removeEmphasis($class) {
        return $this->removeEmphasisClasses();
    }

    public function primary() {
        $this->setEmphasis($this->primary);
    }

    public function secondary() {
        $this->setEmphasis($this->secondary);
    }

    private function removeEmphasisClasses() {
        $this->removeClass($this->primary, $this->secondary);

        return $this;
    }

}
