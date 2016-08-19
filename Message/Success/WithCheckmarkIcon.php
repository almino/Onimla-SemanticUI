<?php

namespace Onimla\SemanticUI\Message\Success;

use Onimla\SemanticUI\Message\Success as Message;
use Onimla\SemanticUI\Icon\Checkmark as Icon;

class WithAnnouncementIcon extends Message {
    public function __construct($text = FALSE) {
        parent::__construct($text);
        $this->icon(new Icon);
    }
}
