<?php

namespace Onimla\SemanticUI\Traits;

use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Column;

trait Button {

    use Basic,
        Colored,
        Component,
        Emphasis,
        Size;

    private function buttonAddClass($instance = FALSE, $class) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $class = func_get_args();
        array_shift($class);


        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($instance->hasClass(Column::CLASS_NAME)) {
            $method = 'before';
            $search = Column::CLASS_NAME;
        }

        call_user_func_array(array($instance->getClassAttribute(), $method), array($search, $class));

        return $this;
    }

    /**
     * @param \Onimla\HTML\Element $instance
     * @return boolean
     */
    public function isButton($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        return $instance->hasClass(Constant::BUTTON);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function setButton($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->setComponent();
        $instance->addClass(Constant::BUTTON);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function unsetButton($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->unsetComponent();
        $instance->removeClass(Constant::BUTTON);
    }

    /**
     * Although any tag can be used for a button, it will only be keyboard
     * focusable if you use a <code>&lt;button&gt;</code> tag or you add the
     * property <code>tabindex=&quot;0&quot;</code>.
     * Keyboard accessible buttons will preserve focus styles after click,
     * which may be visually jarring.
     * @param \Onimla\HTML\Element $instance
     */
    public function setTabIndex($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->attr('tabindex', 0);
    }

}
