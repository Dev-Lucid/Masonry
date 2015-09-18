<?php

namespace html;

class input_hidden extends tag
{
    protected $_tag = 'input';
    protected $_allow_quick_close = true;

    public function defaults()
    {
        $this->type = 'hidden';
    }
}
