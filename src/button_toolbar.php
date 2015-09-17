<?php

namespace html;

class button_toolbar extends tag
{
    protected $_tag = 'div';
    public function defaults()
    {
        $this->role = 'toolbar';
        $this->add_class('btn-toolbar');
    }
}
