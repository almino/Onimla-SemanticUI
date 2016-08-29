<?php

namespace Onimla\SemanticUI\Lyst;

use Onimla\HTML\Element;
use Onimla\SemanticUI\Traits\Description as tDescription;

class Description extends Element {

    use tDescription;

    public function __construct($text = FALSE) {
        parent::__construct('div');
        $this->setDescription();
        $this->text(...func_get_args());
    }

}
