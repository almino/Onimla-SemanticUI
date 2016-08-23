<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Content\Header;

class Popup extends Component {

    protected $header;

    public function __construct($children = FALSE) {
        parent::__construct('div', FALSE, func_get_args());

        $this->addClass(Constant::SPECIAL, Constant::POPUP);
    }

    public function unsetHeader() {
        parent::removeChild($this->header);
        $this->header = NULL;
    }

    public function setHeader($text = FALSE) {
        $this->unsetHeader();
        $this->header = $text instanceof Element ? $text : new Header($text);
        $this->unshiftChildren($this->header);
    }

    public function isHeaderSet() {
        return $this->header instanceof Element AND parent::isChild($this->header);
    }

    /**
     * @param string|Element $text optional
     * @return \Onimla\SemanticUI\Popup|\Onimla\SemanticUI\Content\Header
     */
    public function header($text = FALSE) {
        if ($text === FALSE) {
            if (!$this->isHeaderSet()) {
                $this->setHeader();
            }

            return $this->header;
        }

        $this->setHeader($text);

        return $this;
    }

}
