<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Constant;

class Image extends \Onimla\HTML\Image {

    use Traits\Centered,
        Traits\Component,
        Traits\Floated,
        Traits\Fluid,
        Traits\Size;

    public function __construct($src = FALSE, $alt = FALSE) {
        parent::__construct($src = FALSE, $alt);
        $this->setComponent();
        $this->addClass(Constant::IMAGE);
    }

}
