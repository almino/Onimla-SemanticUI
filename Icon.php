<?php

namespace Onimla\SemanticUI;

use Onimla\HTML\Element;

class Icon extends Element {

    use Traits\Alignment,
        Traits\Colored,
        Traits\Size;

    const CLASS_NAME = 'icon';

    protected $classes = array(
        # Special icons can trigger user actions
        'special' => array(
            'close'
        ),
        # Icons can represent types of content found on websites
        # http://semantic-ui.com/elements/icon.html#web-content
        'web-content' => array(
            'add to calendar',
            'alarm outline',
            'alarm mute outline',
            'alarm mute',
            'alarm',
            'at',
            'browser',
            'bug',
            'calendar outline',
            'calendar',
            'checked calendar',
            'cloud',
            'code',
            'comment outline',
            'comment',
            'comments outline',
            'comments',
            'comments',
            'copyright',
            'creative commons',
            'dashboard',
            'delete calendar',
            'external square',
            'external',
            'external',
            'eyedropper',
            'feed',
            'find',
            'hand pointer',
            'hashtag',
            'heartbeat',
            'history',
            'home',
            'hourglass empty',
            'hourglass end',
            'hourglass full',
            'hourglass half',
            'hourglass start',
            'idea',
            'image',
            'inbox',
            'industry',
            'lab',
            'mail outline',
            'mail square',
            'mail',
            'mouse pointer',
            'options',
            'paint brush',
            'payment',
            'percent',
            'privacy',
            'protect',
            'registered',
            'emove from calendar',
            'search',
            'setting',
            'settings',
            'shop',
            'shopping bag',
            'shopping basket',
            'signal',
            'sitemap',
            'tag',
            'tags',
            'tasks',
            'terminal',
            'text telephone',
            'ticket',
            'trademark',
            'trophy',
            'wifi',
        ),
        # Icons can represent common actions a user can take
        # http://semantic-ui.com/elements/icon.html#user-actions
        'user-actions' => array(
            'add to cart',
            'add user',
            'adjust',
            'archive',
            'ban',
            'bookmark',
            'call',
            'call square',
            'clone',
            'cloud download',
            'cloud upload',
            'talk',
            'talk outline',
            'compress',
            'configure',
            'download',
            'edit',
            'erase',
            'exchange',
            'expand',
            'external share',
            'filter',
            'hide',
            'in cart',
            'lock',
            'mail forward',
            'object group',
            'object ungroup',
            'pin',
            'print',
            'random',
            'recycle',
            'refresh',
            'remove bookmark',
            'remove user',
            'repeat',
            'reply all',
            'reply',
            'retweet',
            'send',
            'send outline',
            'share alternate',
            'share alternate square',
            'share',
            'share square',
            'sign in',
            'sign out',
            'theme',
            'translate',
            'undo',
            'unhide',
            'unlock alternate',
            'unlock',
            'upload',
            'wait',
            'wizard',
            'write',
            'write square',
        ),
        # Icons can alert users to the type of message being displayed
        # http://semantic-ui.com/elements/icon.html#message
        'message' => array(
            'announcement',
            'birthday',
            'help',
            'help circle',
            'info',
            'info circle',
            'warning',
            'warning circle',
            'warning sign',
        ),
        # Icons can represent types of people
        # http://semantic-ui.com/elements/icon.html#user-types
        'user-types' => array(
            'child',
            'doctor',
            'handicap',
            'spy',
            'student',
            'user',
            'users',
        ),
        # Icons can show whether an item is included in a set
        # http://semantic-ui.com/elements/icon.html#item-selection
        'item-selection' => array(
            'add circle',
            'add square',
            'check circle',
            'check circle outline',
            'check square',
            'checkmark box',
            'checkmark',
            'minus circle',
            'minus',
            'minus square',
            'minus square outline',
            'move',
            'plus',
            'plus square outline',
            'radio',
            'remove circle',
            'remove circle outline',
            'remove',
            'selected radio',
            'toggle off',
            'toggle on',
        ),
    );

    public function __construct($class) {
        parent::__construct('i');
        $this->getClassAttribute()->append(self::CLASS_NAME);
        $this->setIcon(...func_get_args());
        $this->selfClose(FALSE);
    }

    public function addClass($class) {
        return $this->getClassAttribute()->before(self::CLASS_NAME, ...func_get_args());
    }

    public function setIcon($class) {
        $this->unsetIcon();
        $this->getClassAttribute()->before(self::CLASS_NAME, ...func_get_args());
    }

    public function unsetIcon() {
        $this->getClassAttribute()->strictRemoveClass($this->classes);
    }

}
