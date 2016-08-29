<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Icon as BaseIcon;

trait PrependIcon {

    /**
     * @var \Onimla\SemanticUI\Icon
     */
    protected $icon = NULL;

    public function unsetIcon() {
        if (method_exists(__CLASS__, 'getContainer')) {
            $this->getContainer()->removeChild($this->icon);
        } else {
            $this->removeChild($this->icon);
        }

        $this->icon = NULL;
    }

    public function removeIcon() {
        $this->unsetIcon();
    }

    public function setIcon($icon = FALSE) {
        $this->icon = $icon instanceof Element ? $icon : new BaseIcon($icon);

        if (method_exists(__CLASS__, 'getContainer')) {
            $this->getContainer()->prepend($this->icon);
        } else {
            $this->prepend($this->icon);
        }
    }

    /**
     * Get and/or set an icon
     * @param string|\Onimla\SemanticUI\Icon $icon
     * @return \Onimla\SemanticUI\Icon
     */
    public function icon($icon = FALSE) {
        if (func_num_args() > 0) {
            $this->setIcon(...func_get_args());
        }

        return $this->icon;
    }

}
