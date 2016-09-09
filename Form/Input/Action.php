<?php

namespace Onimla\SemanticUI\Form\Input;

use Onimla\SemanticUI\Form\Input;

/**
 * @property \Onimla\HTML\Element $action
 */
class Action extends Input {

    const CLASS_NAME = 'action';

    public function __construct($name = FALSE, $value = FALSE, $type = 'text') {
        parent::__construct($name, $value, $type);
        $this->getClassAttribute()->before(parent::CLASS_NAME, self::CLASS_NAME);
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($instance) {
        $this->action = $instance;
    }

    public function unsetAction() {
        unset($this->action);
    }

    public function isAction() {
        return isset($this->action);
    }

    public function action($instance = FALSE) {
        if ($instance === FALSE) {
            return $this->getAction();
        }

        $this->setAction($instance);
        return $this;
    }

}
