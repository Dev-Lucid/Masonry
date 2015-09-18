<?php

namespace html;

class list_item extends tag
{
    protected $_tag = 'li';

    public function __toString()
    {
        $parent = $this->parent();
        if(!is_null($parent) and $parent->has_class('list-group'))
        {
            $this->add_class('list-group-item');
        }
        if(!is_null($parent) and $parent->has_class('nav'))
        {
            $this->add_class('nav-item');
        }
        return parent::__toString();    
    }
}
