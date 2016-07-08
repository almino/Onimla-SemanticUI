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

    const CLASS_NAME = 'field';

    public function __construct($label = FALSE, $name = FALSE, $value = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new \Onimla\HTML\Element('div');
        $this->input = new \Onimla\HTML\Input($name, $value);
        $this->label = new \Onimla\HTML\Label($this->input, $label);
        $this->id = $this->input->id();

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

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

    public function error() {
        $this->container->getClassAttribute()->after(self::CLASS_NAME, 'error');
    }

    public function name($value = FALSE) {
        if ($value === FALSE) {
            return call_user_func(array($this->input, __FUNCTION__));
        }

        call_user_func(array($this->input, __FUNCTION__), $value);
        return $this;
    }

    public function required() {
        return $this->setRequired();
    }

    public function isRequired() {
        return $this->setRequired();
    }

    public function isNotRequired() {
        return $this->unsetRequired();
    }

    public function setRequired() {
        $this->container->getClassAttribute()->prepend('required');
        call_user_func(array($this->input, __FUNCTION__));
        return $this;
    }

    public function unsetRequired() {
        $this->container->removeClass('required');
        call_user_func(array($this->input, __FUNCTION__));
        return $this;
    }

    public function value($value = FALSE) {
        if ($value === FALSE) {
            return $this->input->attr(__FUNCTION__);
        }

        $this->input->value($value);

        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

}
