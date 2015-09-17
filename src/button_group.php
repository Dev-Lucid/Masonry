<?php

namespace html;

class button_group extends tag
{
    protected $_tag = 'div';

    public function defaults()
    {
        $this->role     = 'group';
        $this->add_class('btn-group');
        $this->vertical = false;
    }

    public function __toString()
    {
        if ($this->vertical === true)
        {
            $this->remove_class('btn-group');
            $this->add_class('btn-group-vertical');
        }
        unset($this->vertical);
        return parent::__toString();
    }
}
