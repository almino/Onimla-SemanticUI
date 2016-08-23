<?php

namespace Onimla\SemanticUI\Form;

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\SemanticUI\Component $container
 * @property \Onimla\HTML\Input $input
 * @property \Onimla\HTML\Label $label
 */
class Field extends ContainerInputLabel {

    const CLASS_NAME = 'field';

    /**
     * @param string|\Onimla\HTML\Element $label
     * @param string|\Onimla\HTML\Element $name
     * @param string $value
     */
    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct($label, $name, $value);

        # Instâncias ================================================================= #
        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

        # Árvore ===================================================================== #
        $this->container->label = $this->label;
        $this->container->input = $this->input;
    }

    /**
     * Individual fields may display an error state
     */
    public function error() {
        $this->container->getClassAttribute()->after(self::CLASS_NAME, 'error');
    }

}
