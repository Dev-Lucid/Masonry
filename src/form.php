<?php

namespace html;

class form extends tag
{
    protected $_tag = 'form';

    public function __toString()
    {

        if($this->inline === true)
        {
            $this->add_class('form-inline');
        }
        unset($this->inline);

        return parent::__toString();
    }
}
