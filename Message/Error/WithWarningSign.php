<?php

namespace Onimla\SemanticUI\Message\Error;

use Onimla\SemanticUI\Message\Error as Message;
use Onimla\SemanticUI\Icon\WarningSign as Icon;

class WithWarningSign extends Message {
    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->icon(new Icon);
    }
}
