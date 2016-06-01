<?php

namespace Onimla\SemanticUI;


trait IsComponent {
    public function setComponent() {
        $this->addClass('ui');
    }
    
    public function state($state) {
        
    }
}
