<?php

namespace Onimla\SemanticUI\Modal;

use Onimla\SemanticUI\Modal;

class Small extends Modal {
    public function __construct($id = FALSE) {
        parent::__construct($id);
        $this->small();
    }
}
