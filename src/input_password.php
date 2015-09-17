<?php

namespace html;

class input_password extends input_text
{
    public function defaults()
    {
        parent::defaults();
        $this->type = 'password';
    }
}
