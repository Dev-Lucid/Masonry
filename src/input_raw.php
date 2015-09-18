<?php

namespace html;

class input_raw extends tag
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
        $name_or_id = (isset($this->id))?$this->id:$name_or_id;
        return $name_or_id;
    }

    protected function _determine_form_settings()
    {
        $form = $this->find_form();
        $use_grid  = ($form->grid === true or ($form->has_class('form-grid') === true));
        $is_inline = ($form->inline === true or ($form->has_class('form-inline') === true));
        return [$is_inline,$use_grid];
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

    protected function _render_label($name,$inline = false, $use_grid = false)
    {
        if (isset($this->label))
        {
            $label = new input_label();
            $label->text = $this->label;

            # labels are for screen-readers only if form is inline
            if ($inline === true)
            {
                $label->add_class('sr-only');
            }

            if($use_grid === true)
            {
                $label->add_class('col-sm-2');
            }

            if (!is_null($name))
            {
                $label->for = $name;
            }

            unset($this->label);
            return(string) $label;
        }
    }
}