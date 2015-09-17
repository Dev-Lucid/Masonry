<?php

namespace html;

class card_header extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('card-header');
    }

    
}
