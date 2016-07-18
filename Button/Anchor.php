<?php

namespace Onimla\SemanticUI\Button;

/**
 * An <code>&lt;a&gt;</code> tag styled as a button.
 * Any tag can be used for a button.
 */
class Anchor extends \Onimla\HTML\Anchor {

    use Traits\Button;

    public function __construct($text = FALSE, $href = FALSE, $title = FALSE) {
        parent::__construct($text, $href, $title);
        $this->setButton();
    }

}
