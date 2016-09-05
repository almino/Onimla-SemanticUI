<?php

namespace Onimla\SemanticUI\Icon\Circle;

use Onimla\SemanticUI\Icon\Circle as Icon;
use Onimla\SemanticUI\Icon\Info as BasicInfo;

class Info extends Icon {

    public function __construct() {
        parent::__construct(BasicInfo::CLASS_NAME);
    }

}
