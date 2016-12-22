<?php

namespace Onimla\SemanticUI\Group;

use Onimla\SemanticUI\Component;

/**
 * @see http://semantic-ui.com/elements/segment.html#segments
 */
class Buttons extends Component {

    const CLASS_NAME = 'buttons';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
        $this->getClassAttribute()->append(self::CLASS_NAME);
    }

}
