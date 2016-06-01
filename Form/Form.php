<?php

namespace Onimla\SemanticUI\Form;

/*
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Form.class.php',
        ));

require_once substr(__DIR__, 0, strpos(__DIR__, 'Form')) . 'IsComponent.trait.php';
*/

class Form extends \Onimla\HTML\Form {

    use \Onimla\SemanticUI\IsComponent;

    public function __construct($method = FALSE, $action = FALSE) {
        parent::__construct($method, $action);
        $this->setComponent();
        $this->addClass('form');
    }

}
