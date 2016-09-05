<?php

namespace Onimla\SemanticUI\Message\Info;

use Onimla\SemanticUI\Message\Success as Message;
use Onimla\SemanticUI\Icon\Circle\Info as Icon;

class WithInfoIcon extends Message {

    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->icon(new Icon);
    }

}
