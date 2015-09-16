<?php

namespace html;

class anchor extends tag
{
    function __construct()
    {
        parent::init();
        $this->tag = 'a';
        $this->add('test');
    }
}
