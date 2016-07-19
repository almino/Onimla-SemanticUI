<?php

namespace Onimla\SemanticUI;

/*
  require_once implode(DIRECTORY_SEPARATOR, array(
  substr(__DIR__, 0, strpos(__DIR__, 'Onimla') + 6),
  'HTML',
  'Element.class.php',
  ));

  require_once 'IsComponent.trait.php';
 */

class Component extends \Onimla\HTML\Element {
    
    const CLASS_NAME = 'ui';

    use Traits\Component;

    public function __construct($name = 'div', $attr = FALSE, $children = FALSE) {
        parent::__construct($name, $attr, $children);
        $this->setComponent();
    }

}
