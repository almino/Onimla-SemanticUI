<?php

namespace Onimla\SemanticUI;

/**
 * A segment is used to create a grouping of related content
 */
class Segment extends Component {

    const CLASS_NAME = 'segment';

    use Onimla\SemanticUI\Traits\Attached;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());
    }

}
