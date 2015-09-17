<?php

namespace html;

class input extends tag
{
    public function find_form()
    {
        $current = $this;
        $loop   = true;
        while($loop == true)
        {
            $current = $current->parent();
            if(is_null($current))
            {
                return false;
            }
            else
            {
                if($current->tag() == 'form')
                {
                    $loop = false;
                }
            }
        }
        return $current;
    }

    protected function _determine_name()
    {
        $name_or_id = null;
        $name_or_id = (isset($this->name))?$this->name:null;
        $name_or_id = (isset($this->id))?$this->id:$this->name_or_id;
        return $name_or_id;
    }

    protected function _render_label($name,$inline = false)
    {
        if (isset($this->label))
        {
            $label = new label();
            $label->text = $this->label;

            # labels are for screen-readers only if form is inline
            if ($inline === true)
            {
                $label->add_class('sr-only');
            }

            if (!is_null($name))
            {
                $label->for = $name;
            }

            unset($this->label);
            return(string) $label;
        }
    }

    protected function _render_help($inline = false)
    {
        if (isset($this->help))
        {
            $help = new small();
            $help->add_class('text-muted');
            $help->add($this->help);
            
            unset($this->help);
            return (string) $help;
            
        }
    }

    protected function _render_form_group($inline = false)
    {
        $tag = ($inline == true)?'div':'fieldset';
        $this->_pre_html  = '<'.$tag.' class="form-group">'.$this->_pre_html;
        $this->_post_html = $this->_post_html . '</'.$tag.'>';
    }
}
