<?php

namespace html;

class card_text extends tag
{
    protected $_tag = 'p';

    function defaults()
    {
        $this->add_class('card-text');
    }
}
