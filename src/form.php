<?php

namespace html;

class form extends tag
{
    protected $_tag = 'form';

    public function defaults()
    {
        $this->grid = false;
    }

    public function __toString()
    {
        if($this->grid === true)
        {
            $this->add_class('form-grid');
        }
        unset($this->grid);

        if($this->inline === true)
        {
            $this->add_class('form-inline');
        }
        unset($this->inline);

        return parent::__toString();
    }
}
