<?php

namespace Onimla\SemanticUI;

/**
 * A segment is used to create a grouping of related content
 */
class Segment extends Component {

    use Traits\Attached,
        Traits\Colored;

    const CLASS_NAME = 'segment';

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
    }

}
