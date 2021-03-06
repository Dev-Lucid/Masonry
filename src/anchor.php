<?php

namespace html;

class anchor extends tag
{
    protected $_tag = 'a';

    public function __toString()
    {
        $parent = $this->parent();
        if (!is_null($parent) and $parent->has_class('card-block'))
        {
            $this->add_class('card-link');
        }
        if (!is_null($parent) and ($parent->has_class('nav') or $parent->has_class('nav-item')))
        {
            $this->add_class('nav-link');
        }
        return parent::__toString();
    }
}
