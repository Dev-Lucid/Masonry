<?php

namespace html;

class card_subtitle extends tag
{
    protected $_tag = 'h6';

    function defaults()
    {
        $this->add_class('card-subtitle');
    }
}
