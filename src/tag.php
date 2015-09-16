<?php


namespace html;

class tag
{
    public function init()
    {
        $this->tag               = null;
        $this->attributes        = [];
        $this->children          = [];
        $this->parent            = null;
        $this->allow_quick_close = false;
    }

    protected function _build_attributes()
    {
        $html = '';
        foreach($this->attributes as $key=>$value)
        {
            if (is_array($value))
            {
                $value = implode(' ',$value);
            }
            $html .= ' '.$key.'="'.$value.'"';
        }
        return $html;
    }

    function __toString()
    {
        $html = '<'.$this->tag.$this->_build_attributes();

        if(count($this->children) == 0 and $this->allow_quick_close === true)
        {
            $html .= ' />';
        }
        else
        {
            $html .= '>';
            foreach($this->children as $child)
            {
                $html .= (string) $child;
            }
            $html .= '</'.$this->tag.'>';
        }
        return $html;
    }

    public function add($new_child)
    {
        if (is_object($new_child))
        {
            $new_child->parent = $this;
        }
        $this->children[] = $new_child;
        return $this;
    }
}
