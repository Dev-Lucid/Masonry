<?php

namespace html;

class input_label extends tag
{
    protected $_tag = 'label';

    public function __toString()
    {
        $this->add_class('form-control-label');
        
        if (isset($this->text))
        {
            $this->add($this->text);
        }
        unset($this->text);
        return parent::__toString();
    }
}
