<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Node;
use Onimla\HTML\HasAttribute;
use Onimla\HTML\Appendable;
use Onimla\SemanticUI\Component;
use Onimla\SemanticUI\Content;
use Onimla\SemanticUI\Content\Header as MessageHeader;
use Onimla\SemanticUI\Icon\Close as Dismiss;
use Onimla\SemanticUI\Constant;

/**
 * @property Element $container .ui.message
 * @property Content $content .content
 * @property Icon $icon .icon
 * @property Element $header .header
 * @property Dismiss $dismiss .close.icon
 */
class Message extends Node implements HasAttribute, Appendable {

    const CLASS_NAME = 'message';

    use Traits\Colored;

    public function __construct($text = FALSE) {
        parent::__construct();

        # Instâncias ================================================================= #
        $this->container = new Component;
        $this->content = new Content;

        # Atributos ================================================================== #
        $this->container->addClass(self::CLASS_NAME);

        # Árvore ===================================================================== #
        call_user_func_array(array($this, 'text'), func_get_args());

        $this->container->append($this->content);
    }

    public function __toString() {
        return call_user_func(array($this->container, __FUNCTION__));
    }

    public function count() {
        return call_user_func(array($this->content, __FUNCTION__));
    }

    public function attr($name, $value = FALSE, $output = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function data($key, $value = FALSE, $output = 'encode') {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function removeAttr($name) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function &findByAttr($attr, $value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findById($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &findByName($value) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchAttr($name, $regex, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function &matchClass($classes, $level = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function getClassAttribute() {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function addClass($class) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function removeClass($class) {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function id($value = FALSE) {
        return call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
    }

    public function visible() {
        $this->container->visible();
        return $this;
    }

    public function setWarning() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::WARNING);
    }

    public function unsetWarning() {
        $this->removeClass(Constant::WARNING);
    }

    public function isWarning() {
        return $this->hasClass(Constant::WARNING);
    }

    public function warning() {
        $this->setWarning();
        return $this;
    }

    public function setInfo() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::INFO);
    }

    public function unsetInfo() {
        $this->removeClass(Constant::INFO);
    }

    public function isInfo() {
        return $this->hasClass(Constant::INFO);
    }

    public function info() {
        $this->setInfo();
        return $this;
    }

    public function setSuccess() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::SUCCESS);
    }

    public function unsetSuccess() {
        $this->removeClass(Constant::SUCCESS);
    }

    public function isSuccess() {
        return $this->hasClass(Constant::SUCCESS);
    }

    public function success() {
        $this->setSuccess();
        return $this;
    }

    public function setPositive() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::POSITIVE);
    }

    public function unsetPositive() {
        $this->removeClass(Constant::POSITIVE);
    }

    public function isPositive() {
        return $this->hasClass(Constant::POSITIVE);
    }

    public function positive() {
        $this->setPositive();
        return $this;
    }

    public function setError() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::ERROR);
    }

    public function unsetError() {
        $this->removeClass(Constant::ERROR);
    }

    public function isError() {
        return $this->hasClass(Constant::ERROR);
    }

    public function error() {
        $this->setError();
        return $this;
    }

    public function setNegative() {
        $this->getClassAttribute()->before(self::CLASS_NAME, Constant::NEGATIVE);
    }

    public function unsetNegative() {
        $this->removeClass(Constant::NEGATIVE);
    }

    public function isNegative() {
        return $this->hasClass(Constant::NEGATIVE);
    }

    public function negative() {
        $this->setNegative();
        return $this;
    }

    public function prepend($children) {
        call_user_func_array(array($this->content, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children) {
        call_user_func_array(array(
            $this->content->last() === FALSE ? $this->content : $this->content->last(),
            __FUNCTION__,
                ), func_get_args());
        return $this;
    }

    public function appendText($text) {
        call_user_func_array(array($this->content->last(), __FUNCTION__), func_get_args());
    }

    public function removeContent() {
        return $this->content->removeChildren();
    }

    public function text($string = FALSE) {
        $params = self::filterChildren(func_get_args());

        if (count($params) < 1) {
            return $this->content->text();
        }

        $this->removeContent();

        foreach ($params as $text) {
            if (!$text instanceof Node) {
                $text = new \Onimla\HTML\Paragraph($text);
            }

            $this->content->append($text);
        }

        return $this;
    }

    public function isDismissable() {
        return isset($this->dismiss) AND $this->container->isChild($this->dismiss);
    }

    public function dismissable($instance = FALSE) {
        if ($instance === FALSE) {
            return isset($this->dismiss) ? $this->dismiss : FALSE;
        }

        $this->unsetDismissable();
        $this->setDismissable($instance);

        return $this;
    }

    public function setDismissable($instance = FALSE) {
        $this->dismiss = ($instance === FALSE) ? new Dismiss : $instance;
        $this->container->prepend($this->dismiss);
    }

    public function unsetDismissable() {
        if ($this->isDismissable()) {
            $dismiss = $this->dismiss;
            $this->container->removeChild($dismiss);
            return $dismiss;
        }

        return FALSE;
    }

    public function icon($icon = FALSE) {
        if ($icon === FALSE) {
            return isset($this->icon) ? $this->icon : FALSE;
        }

        $this->removeIcon();

        $this->setIcon($icon);

        return $this;
    }

    public function removeIcon() {
        if (isset($this->icon)) {
            $this->container->removeClass('icon');
            $this->container->removeChild($this->icon);
            $icon = $this->icon;
            unset($this->icon);
            return $icon;
        }

        return FALSE;
    }

    public function setIcon($icon) {
        if ($icon instanceof Icon) {
            $this->icon = $icon;
        } else {
            $this->icon = new Icon($icon);
        }

        $this->container->getClassAttribute()->after(Component::CLASS_NAME, 'icon');

        $this->container->prepend($this->icon);
    }

    public function unsetIcon() {
        return $this->removeIcon();
    }

    public function header($text = FALSE) {
        if ($text === FALSE) {
            return isset($this->header) ? $this->header : FALSE;
        }

        $this->removeHeader();

        $this->setHeader($text);

        return $this;
    }

    public function removeHeader() {
        if (isset($this->header)) {
            $this->content->removeChild($this->header);
            $header = $this->header;
            unset($this->header);
            return $header;
        }

        return FALSE;
    }

    public function setHeader($text) {
        $this->removeHeader();

        $this->header = ($text instanceof Element) ? $text : new MessageHeader($text);

        $this->content->prepend($this->header);
    }

    public function unsetHeader() {
        return $this->removeHeader();
    }

}
