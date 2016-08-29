<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Content\Header as BaseHeader;

trait PrependHeader {

    /**
     * @var \Onimla\SemanticUI\Header
     */
    protected $header = NULL;

    public function unsetHeader() {
        if (property_exists($this, 'content')) {
            $this->content->removeChild($this->header);
        } else {
            $this->removeChild($this->header);
        }

        $this->header = NULL;
    }

    public function removeHeader() {
        $this->unsetHeader();
    }

    public function setHeader($header = FALSE) {
        $this->header = $header instanceof Element ? $header : new BaseHeader($header);

        if (property_exists($this, 'content')) {
            $this->content->prepend($this->header);
        } else {
            $this->prepend($this->header);
        }
    }

    public function header($header = FALSE) {
        if (func_num_args() < 1) {
            return is_null($this->header) ? FALSE : $this->header;
        }

        $this->setHeader(...func_get_args());
        return $this;
    }

}
