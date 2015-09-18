<?php

namespace html;

class input_radio extends input
{
    protected $_tag = 'input';
    protected $_allow_quick_close = true;

    public function defaults()
    {
        $this->type = 'radio';
    }

    public function __toString()
    {
        list($is_inline,$use_grid) = $this->_determine_form_settings(); 
        if ($this->parent()->has_class('form-group'))
        {
            $use_grid = false;
        }
        $this->_render_form_group(false,'radio',$use_grid);
        return parent::__toString();
    }
}
