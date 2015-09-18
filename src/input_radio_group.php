<?php

namespace html;

class input_radio_group extends input
{
    protected $_tag = 'div';

    public function defaults()
    {
        $this->add_class('form-group');
    }

    public function __toString()
    {
        list($is_inline,$use_grid) = $this->_determine_form_settings(); 
        $this->_pre_children_html = $this->_render_label(null,$is_inline,$use_grid).$this->_pre_html;
        if ($use_grid === true)
        {
            $this->add_class('row');
            $this->_pre_children_html .= '<div class="col-sm-10">';   
            $this->_post_children_html = $this->_post_children_html . '</div>';   
    
        }
        return parent::__toString();
    }
}
