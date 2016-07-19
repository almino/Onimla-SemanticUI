<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Heading;
use Onimla\HTML\Element;
use Onimla\SemanticUI\Header\Sub;

/**
 * @property Header\Sub $sub .sub.header
 */
class Header extends Heading {

    const CLASS_NAME = 'header';

    /**
     * @var Icon
     */
    protected $icon;

    use Traits\Alignment,
        Traits\Attached,
        Traits\Component,
        Traits\Colored,
        Traits\Size;

    public function __construct($number, $text = FALSE, $class = FALSE) {
        parent::__construct($number, $text, $class);
        $this->setComponent();
        $this->addClass(self::CLASS_NAME);
    }

    public function dividing() {
        return $this->getClassAttribute()->before(self::CLASS_NAME, __FUNCTION__);
    }

    public function block() {
        return $this->getClassAttribute()->before(self::CLASS_NAME, __FUNCTION__);
    }
    
    public function setSub($text) {
        $this->removeSub();

        if ($text instanceof Element) {
            $this->sub = $text;
        } else {
            $this->sub = new Sub($text);
        }
    }

    public function removeSub() {
        if (isset($this->sub)) {
            $sub = $this->sub;
            $this->removeChild($this->sub);
            return $sub;
        }
        
        return FALSE;
    }

    public function unsetSub() {
        return $this->removeSub();
    }

    public function sub($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->sub) ? $this->sub : FALSE;
        }
        
        $this->setSub($text);

        return $this;
    }
    
    public function removeIcon() {
        return $this->unsetIcon();
    }

    public function unsetIcon() {
        if ($this->icon === NULL) {
            return FALSE;
        }
        
        $this->removeChild($this->icon);

        $icon = $this->icon;
        $this->icon = NULL;

        return $icon;
    }

    public function setIcon($instance) {
        if ($instance instanceof Icon) {
            $this->icon = $instance;
        } else {
            $this->icon = new Icon($instance);
        }

        $this->unsetIcon();
        $this->prepend($this->icon);
    }

    public function icon($instance = FALSE) {
        if ($instance === FALSE) {
            return $this->icon instanceof Icon ? $this->icon : FALSE;
        }

        $this->setIcon($instance);

        return $this;
    }

}
