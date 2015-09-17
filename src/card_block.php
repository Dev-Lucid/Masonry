<?php

namespace html;

class card_block extends tag
{
    protected $_tag = 'div';

    public function defaults()
    {
        $this->add_class('card-block');
        
    }

    public function __toString()
    {
        $this->add_class('card-block');
        if (isset($this->title))
        {
            $this->add(new card_title($this->title));
        }
        unset($this->title);

        if (isset($this->subtitle))
        {
            $this->add(new card_subtitle($this->subtitle));
        }
        unset($this->subtitle);

        if (isset($this->text))
        {
            $this->add(new card_text($this->text));
        }
        unset($this->text);

        if (is_string($this->_children[0]))
        {
            $this->_children[] = new card_text($this->_children[0]);
            array_shift($this->_children);
        }
 
        return parent::__toString();
    }
}
