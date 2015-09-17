<?php

namespace html;

class label extends tag
{
    protected $_tag = 'label';

    public function __toString()
    {
        if (isset($this->text))
        {
            $this->add($this->text);
        }
        unset($this->text);
        return parent::__toString();
    }
}
