<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;

trait Active {

    public function setActive() {
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if (method_exists($this, 'isItem') AND $this->isItem()) {
            $method = 'before';
            $search = Constant::ITEM;
        }

        /*
          echo "<p>";
          echo "<em>" . microtime(TRUE) . "</em>";
          echo " <code style=\"color: grey;\">{$this->selector('css')}</code>: ";
          echo "&ensp;Insert <strong>{$color}</strong> {$method} <code>{$search}</code>";
          echo ".</p>";
         */

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, Constant::ACTIVE));
    }

    public function unsetActive() {
        $this->removeClass(Constant::ACTIVE);
    }

    public function isActive() {
        return $this->hasClass(Constant::ACTIVE);
    }

}
