<?php

namespace html;

class nav_tab_panel extends tag
{
    protected $_tag = 'div';

    public function defaults()
    {
        $this->role = 'tabpanel';
        $this->add_class('tab-pane');
        $this->add_class('fade');
    }

    public function __toString()
    {
        return parent::__toString();
    }
}
