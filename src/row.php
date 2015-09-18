<?php

namespace html;

class row extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('row');
    }
}
