<?php

namespace Onimla\SemanticUI\Message;

use Onimla\SemanticUI\Message;

class Success extends Message {

    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->success();
    }

}
