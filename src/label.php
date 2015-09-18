<?php

namespace html;

class label extends tag
{
    protected $_tag = 'span';
    protected $_modifier_prefix = 'label';

    public function defaults()
    {
        $this->add_class('label');
    }

    public function __toString()
    {   
        if (isset($this->pill) and $this->pill === true)
        {
            $this->add_class('label-pill');
        }
        unset($this->pill);

        if (isset($this->text))
        {
            $this->add(new card_text($this->text));
        }
        unset($this->text);

        return parent::__toString();
    }
}
