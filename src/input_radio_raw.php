<?php

namespace html;

class input_radio_raw extends input_raw
{
    protected $_tag = 'input';
    protected $_allow_quick_close = true;

    public function defaults()
    {
        $this->type = 'radio';
    }
}
