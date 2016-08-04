<?php

namespace Onimla\SemanticUI\Icon\Outline;

use Onimla\SemanticUI\Icon\Outline as Icon;
use Onimla\SemanticUI\Icon\Comments as BasicComments;

class Comments extends Icon {

    public function __construct() {
        parent::__construct(BasicComments::CLASS_NAME);
    }

}
