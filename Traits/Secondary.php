<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Secondary {

    public function setSecondary() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::BUTTON)) {
            $method = 'before';
            $search = Constant::BUTTON;
        }

        if ($this->hasClass(Constant::MENU)) {
            $method = 'before';
            $search = Constant::MENU;
        }
        
        if (method_exists($this, 'isPointing') AND $this->isPointing()) {
            $method = 'before';
            $search = Constant::POINTING;
        }

        /*
          echo "<p>";
          echo "<em>" . microtime(TRUE) . "</em>";
          echo " <code style=\"color: grey;\">{$this->selector('css')}</code>: ";
          echo "&ensp;Insert <strong>{$color}</strong> {$method} <code>{$search}</code>";
          echo ".</p>";
         */

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::SECONDARY));
    }

    public function unsetSecondary() {
        $this->removeClass(Constant::SECONDARY);
    }

    public function isSecondary() {
        return $this->hasClass(Constant::SECONDARY);
    }

    public function secondary() {
        $this->setSecondary();
        return $this;
    }

}
