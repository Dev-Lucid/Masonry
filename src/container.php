<?php

namespace html;

class container extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('container');
        $this->fluid = true;
    }

    function __toString()
    {
        if ($this->fluid === true)
        {
            $this->add_class('container-fluid');
            $this->remove_class('container');
        }
        unset($this->fluid);
        return parent::__toString();
    }
}
