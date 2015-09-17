<?php

namespace html;

class card_title extends tag
{
    protected $_tag = 'h4';

    function defaults()
    {
        $this->add_class('card-title');
    }
}
