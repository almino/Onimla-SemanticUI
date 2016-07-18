<?php

namespace Onimla\SemanticUI\Icon\Outline;

use Onimla\SemanticUI\Icon\Outline as Icon;
use Onimla\SemanticUI\Icon\Mail as BasicMail;

class Mail extends Icon {
    public function __construct() {
        parent::__construct(BasicMail::CLASS_NAME);
    }
}
