<?php

namespace Onimla\SemanticUI;

class Icon extends \Onimla\HTML\Element {

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
        call_user_func_array(array($this, 'setIcon'), func_get_args());
    }

    public function setIcon($class) {
        $this->unsetIcon();
        $this->addClass('icon', func_get_args());
    }

    public function unsetIcon() {
        $this->removeClass('icon', $this->classes);
    }

}
