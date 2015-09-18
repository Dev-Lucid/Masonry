<?php

namespace html;

class input_select extends input
{
    protected $_tag = 'select';

    public function defaults()
    {
        $this->add_class('c-select');
        $this->add_class('form-control');
    }

    public function _set_options($options)
    {
        foreach($options as $option)
        {
            $selected = ($option[0] == $this->value);
            $this->add(new option([
                'value'=>$option[0],
                'text' =>$option[1],
            ]));
            if ($selected == true)
            {
                $this->last_child()->selected = 'selected';
            }
        }
    }

    public function __toString()
    {
        $identifier = $this->_determine_name();
        list($is_inline,$use_grid) = $this->_determine_form_settings();       

        #$this->placeholder = strip_tags($this->label);
        #$this->_render_addons();
        $this->_post_html = $this->_post_html.$this->_render_help($is_inline);

        if ($use_grid === true)
        {
            $this->_pre_html  = '<div class="col-sm-10">'.$this->_pre_html;
            $this->_post_html = $this->_post_html.'</div>';

        }
        $this->_pre_html  = $this->_render_label($identifier,$is_inline,$use_grid).$this->_pre_html;

        $this->_render_form_group($is_inline,'text',$use_grid);

        return parent::__toString();
    }
}
