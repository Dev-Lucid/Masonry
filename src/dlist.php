<?php

namespace html;

class dlist extends tag
{
    protected $_tag = 'dl';

    public function defaults()
    {
        $this->add_class('dl-horizontal');
    }
}
