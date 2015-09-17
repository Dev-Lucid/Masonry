<?php

namespace html;

class card_columns extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('card-columns');
    }
}
