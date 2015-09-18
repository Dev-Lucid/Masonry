<?php

namespace html;

class breadcrumb extends tag
{
    protected $_tag = 'ol';

    public function defaults()
    {
        $this->add_class('breadcrumb');
    }
}
