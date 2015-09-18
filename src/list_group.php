<?php

namespace html;

class list_group extends tag
{
    protected $_tag = 'ul';

    public function defaults()
    {
        $this->add_class('list-group');
    }
}
