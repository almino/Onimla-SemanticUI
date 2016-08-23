<?php

namespace Onimla\SemanticUI\Message;

use Onimla\SemanticUI\Message as BaseMessage;

class Info extends BaseMessage {

    public function __construct($text = FALSE) {
        parent::__construct(...func_get_args());
        $this->setInfo();
    }

}
