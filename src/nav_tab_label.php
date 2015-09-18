<?php

namespace html;

class nav_tab_label extends tag
{
    protected $_tag = 'a';

    public function defaults()
    {
        $this->_pre_html  = '<li class="nav-item">';
        $this->_post_html = '</li>';
        $this->add_class('nav-link');
        $this->role = 'tab';
        $this->__set('data-toggle','tab');
    }

    public function __toString()
    {
        $parent = $this->parent();
        if (!is_null($parent) and $parent->has_class('card-block'))
        {
            $this->add_class('card-link');
        }
        if (!is_null($parent) and ($parent->has_class('nav') or $parent->has_class('nav-item')))
        {
            $this->add_class('nav-link');
        }
        return parent::__toString();
    }
}
