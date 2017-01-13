<?php

namespace Onimla\SemanticUI\Menu\Item;

use Onimla\SemanticUI\Content\Item;
use Onimla\SemanticUI\Constant;
use Onimla\SemanticUI\Icon;
use Onimla\SemanticUI\Content\Menu as SubMenu;

/**
 * @property string $spacer
 * @property \Onimla\SemanticUI\Icon $caret <code>&lt;i class=&quot;dropdown icon&quot;&gt;&lt;/i&gt;</code>
 * @property \Onimla\SemanticUI\Content\Menu $container div.menu
 */
class Dropdown extends Item
{

    public function __construct($text = FALSE)
    {
        parent::__construct();
        $this->getClassAttribute()->before(Constant::ITEM, Constant::DROPDOWN);

        $this->text($text);

        $this->spacer = '&nbsp;';
        $this->caret = new Icon(Constant::DROPDOWN);
        $this->container = new SubMenu;
    }

    public function prepend($children)
    {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

    public function append($children)
    {
        call_user_func_array(array($this->container, __FUNCTION__), func_get_args());
        return $this;
    }

}
