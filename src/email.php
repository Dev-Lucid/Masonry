<?php

namespace html;

class input_email extends input_text
{
    public function defaults()
    {
        parent::defaults();
        $this->type = 'email';
    }
}
