<?php

namespace Onimla\SemanticUI\Traits;

trait Button {

    use Basic,
        Component,
        Emphasis;

    private function buttonAddClass($instance = FALSE, $class) {
        if (!is_object($instance)) {
            $instance = $this;
        }
        
        $class = func_get_args();
        array_shift($class);
        
        
        $method = 'after';
        $search = \Onimla\SemanticUI\Component::CLASS_NAME;

        if ($instance->hasClass(\Onimla\SemanticUI\Column::CLASS_NAME)) {
            $method = 'before';
            $search = \Onimla\SemanticUI\Column::CLASS_NAME;
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

        return $instance->hasClass(\Onimla\SemanticUI\Constant::BUTTON);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function setButton($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->setComponent();
        $instance->addClass(\Onimla\SemanticUI\Constant::BUTTON);
    }

    /**
     * @param \Onimla\HTML\Element $instance
     */
    public function unsetButton($instance = FALSE) {
        if (!is_object($instance)) {
            $instance = $this;
        }

        $instance->unsetComponent();
        $instance->removeClass(\Onimla\SemanticUI\Constant::BUTTON);
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
