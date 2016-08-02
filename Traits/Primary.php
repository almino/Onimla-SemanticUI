<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Primary {

    public function setPrimary() {
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

        /*
          echo "<p>";
          echo "<em>" . microtime(TRUE) . "</em>";
          echo " <code style=\"color: grey;\">{$this->selector('css')}</code>: ";
          echo "&ensp;Insert <strong>{$color}</strong> {$method} <code>{$search}</code>";
          echo ".</p>";
         */

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::PRIMARY));
    }

    public function unsetPrimary() {
        $this->removeClass(Constant::PRIMARY);
    }

    public function isPrimary() {
        return $this->hasClass(Constant::PRIMARY);
    }

    public function primary() {
        $this->setPrimary();
        return $this;
    }

}
