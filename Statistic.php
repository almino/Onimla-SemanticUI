<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Node;
use Onimla\SemanticUI\Component;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;

class Statistic extends Node {

    public function getValue() {
        if (!isset($this->value)) {
            $this->value = new Statistic\Value();
        }

        return $this->value;
    }

    public function setValue($instance) {
        if ($instance instanceof HasAttribute OR $instance instanceof Appendable) {
            $this->value = $instance;
        } else {
            $this->value = new Statistic\Value($instance);
        }
    }

    public function unsetValue() {
        $tmp = $this->getValue();
        unset($this->value);
        $this->getValue();
        return $tmp;
    }

    public function value($instance = FALSE) {
        if (func_get_args() > 0) {
            $this->setValue($instance);
            return $this;
        }

        return $this->getValue();
    }

    public function getLabel() {
        if (!isset($this->label)) {
            $this->label = new Statistic\Label();
        }

        return $this->label;
    }

    public function setLabel($instance) {
        if ($instance instanceof HasAttribute OR $instance instanceof Appendable) {
            $this->label = $instance;
        } else {
            $this->label = new Statistic\Label($instance);
        }
    }

    public function unsetLabel() {
        $tmp = $this->getLabel();
        unset($this->label);
        $this->getLabel();
        return $tmp;
    }

    public function label($instance = FALSE) {
        if (func_get_args() > 0) {
            $this->setLabel($instance);
            return $this;
        }

        return $this->getLabel();
    }

}
