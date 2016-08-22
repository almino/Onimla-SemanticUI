<?php

namespace Onimla\SemanticUI\Form;

use Onimla\HTML\Checkbox as BaseCheckbox;
use Onimla\SemanticUI\Traits\Togglable;

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\SemanticUI\Component $container
 * @property \Onimla\HTML\Input $input
 * @property \Onimla\HTML\Label $label
 */
class Checkbox extends ContainerInputLabel {

    use Togglable;

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

}
