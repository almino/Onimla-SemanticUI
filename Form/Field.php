<?php

namespace Onimla\SemanticUI\Form;

/*
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Node.class.php',
        ));
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Element.class.php',
        ));
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Input.class.php',
        ));
require_once implode(DIRECTORY_SEPARATOR, array(
            substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
            'HTML',
            'Label.class.php',
        ));
 */

/**
 * A field is a form element containing a label and an input
 * @property \Onimla\HTML\Element $container
 * @property \Onimla\HTML\Input $input
 * @property \Onimla\HTML\Label $label
 */
class Field extends \Onimla\HTML\Node implements \Onimla\HTML\HasAttribute, \Onimla\HTML\Appendable {

    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new \Onimla\HTML\Element('div');
        $this->input = new \Onimla\HTML\Input($name, $value);
        $this->label = new \Onimla\HTML\Label($this->input, $label);

        # Atributos ================================================================== #
        $this->container->addClass('field');

        # Árvore ===================================================================== #
        $this->container->append($this->label, $this->input);
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        return call_user_func_array(array($this->input, __FUNCTION__), func_get_args());
    }

    public function &findByAttr($attr, $value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findById($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findByName($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchAttr($name, $regex, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchClass($classes, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

}
