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
        $form = $this->find_form();
        $identifier = $this->_determine_name();
        $is_inline = ($form->inline === true or ($form->has_class('form-inline') === true));
        
        $this->placeholder = strip_tags($this->label);
        $this->_pre_html  .= $this->_render_label($identifier,$is_inline);
        $this->_post_html .= $this->_render_help($is_inline);

        $this->_render_form_group($is_inline);

        return parent::__toString();
    }
}
