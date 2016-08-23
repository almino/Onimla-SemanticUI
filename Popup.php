<?php

namespace Onimla\SemanticUI;

use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Content\Header as PopupHeader;

class Popup extends Component {
    
    use Traits\Fluid;

    protected $header;

    public function __construct($text = FALSE) {
        # Instâncias ================================================================= #
        parent::__construct('div');

        # Atributos ================================================================== #
        $this->addClass(Constant::SPECIAL, Constant::POPUP);

        # Árvore ===================================================================== #
        $this->text(...func_get_args());
    }

    public function unsetHeader() {
        parent::removeChild($this->header);
        $this->header = NULL;
    }

    public function setHeader($text = FALSE) {
        $this->unsetHeader();
        $this->header = $text instanceof Element ? $text : new PopupHeader($text);
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
