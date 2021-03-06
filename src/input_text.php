<?php

namespace html;

class input_text extends input
{
    protected $_tag = 'input';
    protected $_allow_quick_close = true;

    public function defaults()
    {
        $this->add_class('form-control');
        $this->type = 'text';
    }

    public function __toString()
    {
        $identifier = $this->_determine_name();
        list($is_inline,$use_grid) = $this->_determine_form_settings();       

        $this->placeholder = strip_tags($this->label);
        $this->_render_addons();
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
