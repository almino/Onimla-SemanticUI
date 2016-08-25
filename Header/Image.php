<?php

namespace Onimla\SemanticUI\Header;

use Onimla\SemanticUI\Header as BaseHeader;
use Onimla\SemanticUI\Image;

class Image extends BaseHeader {

    protected $header;

    public function __construct($image = FALSE, $number, $text = FALSE) {
        parent::__construct($number, $text);
    }

    public function removeImage() {
        return $this->unsetImage();
    }

    public function unsetImage() {
        if ($this->image === NULL) {
            return FALSE;
        }

        $this->removeChild($this->image);

        $image = $this->image;
        $this->image = NULL;

        return $image;
    }

    public function setImage($instance) {
        if ($instance instanceof Image) {
            $this->image = $instance;
        } else {
            $this->image = new Image($instance);
        }

        $this->unsetImage();
        $this->prepend($this->image);
    }

    public function image($instance = FALSE) {
        if ($instance === FALSE) {
            return $this->image instanceof Image ? $this->image : FALSE;
        }

        $this->setImage($instance);

        return $this;
    }

}
