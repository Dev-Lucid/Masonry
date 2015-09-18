<?php

namespace html;

class nav extends tag
{
    protected $_tag = 'ul';

    public function defaults()
    {
        $this->add_class('nav');
    }

    public function __toString()
    {
        if($this->pills === true)
        {
            $this->add_class('nav-pills');
        }
        unset($this->pills);

        if($this->stacked === true)
        {
            $this->add_class('nav-pills');
            $this->add_class('nav-stacked');
        }
        unset($this->stacked);

        return parent::__toString();
    }
}
