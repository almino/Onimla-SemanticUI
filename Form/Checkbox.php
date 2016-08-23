<?php

namespace Onimla\SemanticUI\Form;

use Onimla\HTML\Checkbox as BaseCheckbox;
use Onimla\SemanticUI\Traits\Togglable;
use Onimla\SemanticUI\Traits\Checked;
use Onimla\HTML\Constant;

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\SemanticUI\Component $container
 * @property \Onimla\HTML\Checkbox $input
 * @property \Onimla\HTML\Label $label
 */
class Checkbox extends ContainerInputLabel {

    use Togglable;

use Checked {
        setChecked as tSetChecked;
        unsetChecked as tUnsetChecked;
    }

    const CLASS_NAME = 'checkbox';

    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct($label, $name, $value);

        # Instâncias ================================================================= #
        $this->input = $name instanceof Element ? $name : new BaseCheckbox($name, $value);

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

        # Árvore ===================================================================== #
        $this->container->input = $this->input;
        $this->container->label = $this->label;
    }

    public function setChecked() {
        $this->tSetChecked();
        $this->input->setChecked();
    }
    
    public function unsetChecked() {
        $this->tUnsetChecked();
        $this->input->unsetChecked();
    }

}
