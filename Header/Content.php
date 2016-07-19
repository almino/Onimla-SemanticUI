<?php

namespace Onimla\SemanticUI\Header;

use Onimla\HTML\Node;
use Onimla\HTML\Appendable;
use Onimla\SemanticUI\Header;
use Onimla\SemanticUI\Header\Sub;

/**
 * @property Header $header .ui.header
 * @property \Onimla\SemanticUI\Content $content .content
 */
class Content extends Node implements Appendable {

    public function __construct($number = FALSE, $text = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->header = new Header($number);
        $this->content = new \Onimla\SemanticUI\Content();

        # Atributos ================================================================== #
        # Árvore ===================================================================== #
        $this->content->text($text);

        /* -------------------------------------------------------------------------- */

        $this->header->append($this->content);
    }

    public function prepend($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function text($text = FALSE) {
        if ($text === FALSE) {
            return $this->content->text();
        }

        $this->content->text(...func_get_args());
        return $this;
    }

    public function setSub($text) {
        $this->removeSub();

        if ($text instanceof Element) {
            $this->sub = $text;
        } else {
            $this->sub = new Sub($text);
        }

        $this->content->append($this->sub);
    }

    public function removeSub() {
        if (isset($this->sub)) {
            $sub = $this->sub;

            $this->content->removeChild($this->sub);
            unset($this->sub);

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

}
