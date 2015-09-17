<?php

namespace html;

class anchor extends tag
{
    protected $_tag = 'a';

    public function __toString()
    {
        if (!is_null($this->_parent) and $this->_parent->has_class('card-block'))
        {
            $this->add_class('card-link');
        }
        return parent::__toString();
    }
}
