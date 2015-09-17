<?php

namespace html;

class card_footer extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('card-footer');
        $this->add_class('text-muted');
    }
}
