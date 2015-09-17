<?php

namespace html;

class thead extends tag
{
    protected $_tag = 'thead';

    public function __toString()
    {
        if ($this->inverse === true)
        {
            $this->add_class('thead-inverse');
        }
        else
        {
            $this->add_class('thead-default');
        }
        unset($this->inverse);
        
        
        return parent::__toString();
    }
}
