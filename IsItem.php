<?php

namespace Onimla\SemanticUI;


trait IsItem {
    public function setItem() {
        $this->addClass('item');
    }
}
