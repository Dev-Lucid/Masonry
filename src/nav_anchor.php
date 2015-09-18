<?php

namespace html;

class nav_anchor extends anchor
{
    protected $_tag = 'a';

    public function __toString()
    {
        $this->add_class('nav-link');
        $this->_pre_html = '<li class="nav-item">';
        $this->_post_html = '</li>';
        return parent::__toString();
    }
}
