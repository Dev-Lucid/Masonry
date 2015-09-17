<?php

namespace html;

class blockquote extends tag
{
    protected $_tag = 'blockquote';

    public function defaults()
    {
        $this->add_class('blockquote');
    }

    public function __toString()
    {
        $this->add(new paragraph($this->quote));
        unset($this->quote);

        $footer = new footer($this->source . (new cite($this->title,['title'=>$this->title])));
        $this->add($footer);
        unset($this->source);
        unset($this->title);

        if($this->reverse === true)
        {
            $this->add_class('blockquote-reverse');
            unset($this->reverse);
        }

        return parent::__toString();
    }
}
