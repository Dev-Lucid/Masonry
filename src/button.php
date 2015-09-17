<?php

namespace html;

class button extends tag
{
    protected $_tag = 'button';
    protected $_modifier_prefix = 'btn';
    protected $_size_prefix     = 'btn';

    public function defaults()
    {
        $this->type = 'button';
        $this->add_class('btn');
    }

    public function __toString()
    {
        if($this->type == 'submit')
        {
            $this->_tag = 'input';
            $this->_allow_quick_close = true;
            if (count($this->_children) > 0)
            {
                $this->value = $this->_render_children();
                $this->_children = [];
            }
            else if (isset($this->text))
            {
                $this->value = $this->text;
                unset($this->text);
            }
        }
        else if (isset($this->href))
        {
            $this->_tag = 'a';
            $this->role = 'button';
            unset($this->type);
        }

        # handle the outline flag
        # find the modifier and modify it if necessary
        if ($this->outline === true)
        {
            $modifier = $this->modifier;
            $this->clear_modifier();
            $this->add_class($this->_modifier_prefix.'-'.$modifier.'-outline');
        }
        unset($this->outline);

        if ($this->block === true)
        {
            $this->add_class('btn-block');
        }
        unset($this->block);

        return parent::__toString();
    }
}
