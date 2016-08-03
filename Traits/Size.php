<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\HTML\Attribute\Klass;
use Onimla\SemanticUI\Constant;

trait Size {

    protected $sizes = array(
        'mini',
        'tiny',
        'small',
        'medium',
        'large',
        'big',
        'huge',
        'massive',
    );

    public function getSize() {
        return Klass::outputValue($this->getClassAttribute()->hasAny($this->sizes));
    }

    public function setSize($size) {
        $this->unsetSize();

        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($this->hasClass(Constant::HEADER)) {
            $method = 'before';
            $search = Constant::HEADER;
        }

        if (method_exists($this, 'color') AND strlen($this->color()) > 0) {
            $method = 'before';
            $search = $this->color();
        }

        /*
          echo "<p>";
          echo "<em>" . microtime(TRUE) . "</em>";
          echo " <code style=\"color: grey;\">{$this->selector('css')}</code>: ";
          echo "&ensp;Insert <strong>{$size}</strong> {$method} <code>{$search}</code>";
          echo ".</p>";
         */

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, $size));
    }

    public function unsetSize() {
        $this->removeClass($this->sizes);
    }

    /**
     * 
     * @param string $class Will be converted to an valid regular expression
     * @return boolean
     */
    public function isSizeSet() {
        return $this->hasClass('/' . implode('|', $this->sizes) . '/');
    }

    public function size($size = FALSE) {
        if (in_array($size, $this->sizes)) {
            $this->setSize();
            return $this;
        }

        return $this->getSize();
    }

    public function mini() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function tiny() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function small() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function medium() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function large() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function big() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function huge() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

    public function massive() {
        $this->setSize(__FUNCTION__);
        return $this;
    }

}
