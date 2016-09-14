<?php

namespace Onimla\SemanticUI\Message\Warning;

use Onimla\SemanticUI\Message\Warning as BaseMessage;
use Onimla\SemanticUI\Icon\WarningSign as Icon;

class WithWarningSign extends BaseMessage {

    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->icon(new Icon);
    }

}
