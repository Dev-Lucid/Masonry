<?php

namespace html;

class icon extends tag
{
    protected $_tag = 'i';

    public static function __callStatic($library_prefix,$args)
    {
        $icon = array_shift($args);
        return '<i class="'.$library_prefix.' '.$library_prefix.'-'.$icon.'"></i>';
    }
}
