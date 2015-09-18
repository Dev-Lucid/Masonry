<?php

namespace html;

class input extends input_raw
{
    protected function _render_addons()
    {
        if (isset($this->prefix) or isset($this->suffix))
        {
            $this->_pre_html = $this->_pre_html . '<div class="input-group">';
            $this->_post_html = '</div>'.$this->_post_html;
            if (isset($this->prefix))
            {
                $this->_pre_html  = $this->_pre_html . '<span class="input-group-addon">'.$this->prefix.'</span>';
            }
            if (isset($this->suffix))
            {
                $this->_post_html = '<span class="input-group-addon">'.$this->suffix.'</span>'.$this->_post_html;
            }
        }
    }

    protected function _render_form_group($inline = false, $type = 'text', $use_grid = false)
    {
        if ( $type === 'text' or $use_grid === true)
        {
            $tag = ($inline == false and $use_grid == false)?'fieldset':'div';
            #echo('type is '.$type.', adding form-group '.$tag."\n");

            $this->_pre_html  = '<'.$tag.' class="form-group'.(($use_grid == true)?' row':'').'">'.$this->_pre_html;
            $this->_post_html = $this->_post_html . '</'.$tag.'>';
        }
        
        if ($type === 'radio' or $type === 'checkbox')
        {
            $disabled = ($this->disabled === true)?' disabled':'';
            $this->_pre_html  = $this->_pre_html.'<div class="'.$type. $disabled.'"><label>';
            $this->_post_html = ' '.$this->label.'</label></div>'.$this->_post_html;
        }
    }
}
