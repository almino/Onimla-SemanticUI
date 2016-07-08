<?php

namespace Onimla\SemanticUI\Message\Error;

use Onimla\SemanticUI\Message\Error as ErrorMessage;
use Onimla\SemanticUI\Icon\WarningSign as Icon;

class WithWarningSign extends ErrorMessage {
    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->icon(new Icon);
    }
}
