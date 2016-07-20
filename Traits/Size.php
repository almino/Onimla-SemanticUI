<?php

namespace Onimla\SemanticUI\Traits;

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

    public function setSize($size) {
        $this->unsetSize();

        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if (method_exists($this, 'color') AND $this->color() !== FALSE) {
            $method = 'before';
            $search = $this->color();
        }

        call_user_func_array(array($this->getClassAttribute(), $method), array($search, func_get_args()));
    }

    public function unsetSize() {
        $this->removeClass($this->sizes);
    }

    public function isSize() {
        return $this->hasClass('/' . implode('|', $this->sizes) . '/');
    }

    public function size($size = FALSE) {
        if (in_array($sie, $this->sizes)) {
            $this->setSize();
            return $this;
        }

        return $this->getClassAttribute()->hasAny($this->sizes);
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
