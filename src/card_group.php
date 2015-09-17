<?php

namespace html;

class card_group extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('card-group');
    }
}
