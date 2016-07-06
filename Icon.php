<?php

namespace Onimla\SemanticUI;

class Icon extends \Onimla\HTML\Element {

    const CLASS_NAME = 'icon';

    protected $classes = array(
        # Icons can alert users to the type of message being displayed
        'message' => array(
            'announcement',
            'birthday',
            'help',
            'help circle',
            'info',
            'info circle',
            'warning',
            'warning circle',
            'warning sign',
        ),
    );

    public function __construct($class) {
        parent::__construct('i');
        $this->addClass(self::CLASS_NAME);
        call_user_func_array(array($this, 'setIcon'), func_get_args());
    }

    public function setIcon($class) {
        $this->unsetIcon();
        $this->getClassAttribute()->before(self::CLASS_NAME, func_get_args());
    }

    public function unsetIcon() {
        $this->removeClass($this->classes);
    }

}
