<?php

namespace Onimla\SemanticUI\Menu\Item;

use Onimla\SemanticUI\Content\Item;
use Onimla\SemanticUI\Component;
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
        $this->getClassAttribute()->prepend(Component::CLASS_NAME)->before(Constant::ITEM, Constant::DROPDOWN);

        $this->text($text);

        $this->container = new SubMenu;
    }

    public function text($text = FALSE)
    {
        $children = $this->filterChildren(...func_get_args());
        array_walk($children, 'htmlentities');

        if (count($children) < 1) {
            return parent::text();
        }

        if (isset($this->container)) {
            # Salva os itens do sub menu
            $menu = $this->container;
        }

        # Redefine tudo!
        $this->children = $children;

        # Coloca o ícone para indicar o sub menu
        $this->spacer = '&nbsp;';
        $this->caret = new Icon(Constant::DROPDOWN);

        if ($menu) {
            $this->container = $menu;
        }

        return $this;
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

    public function appendText($text)
    {
        # Pega todos os parâmetros passados
        $children = self::arrayFlatten(func_get_args());
        # Ajusta o texto
        array_walk($children, 'htmlentities');
        # Coloca o texto no lugar devido
        $this->addChildrenBefore($this->spacer, $children);

        return $this;
    }

}
