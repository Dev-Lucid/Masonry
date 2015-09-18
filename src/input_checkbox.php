<?php

namespace html;

class input_checkbox extends input
{
    protected $_tag = 'input';
    protected $_allow_quick_close = true;

    public function defaults()
    {
        $this->type = 'checkbox';
    }

    public function __toString()
    {
        list($is_inline,$use_grid) = $this->_determine_form_settings(); 
        if ($this->parent()->has_class('form-group'))
        {
            $use_grid = false;
        }
        $this->_render_form_group(false,'checkbox',$use_grid);
        return parent::__toString();
    }
}
