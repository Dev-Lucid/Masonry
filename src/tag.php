<?php


namespace html;

class tag
{
    protected $_tag                = null;
    protected $_children           = [];
    protected $_parent             = null;
    protected $_allow_quick_close  = false;
    protected $_attributes         = [];
    protected $_pre_html           = '';
    protected $_post_html          = '';
    protected $_pre_children_html  = '';
    protected $_post_children_html = '';
    protected $_modifier_prefix    = null;

    public function __construct($text_or_config=[], $config_if_text_is_set=[])
    {
        $this->init($text_or_config, $config_if_text_is_set);
    }

    public function init($text_or_config=[], $config_if_text_is_set=[])
    {
        if (!is_array($text_or_config))
        {
            $this->add($text_or_config);
            $config = $config_if_text_is_set;
        }
        else
        {
            $config = $text_or_config; 
        }

        $this->defaults();
        foreach($config as $key=>$value)
        {
            if ($key == 'text')
            {
                $this->add($value);
            }
            else
            {
                $this->$key = $value;    
            }
        }
    }

    # empty, overridden 
    public function defaults()
    {
        
    }

    public function __set($name,$value)
    {
        $method_name = '_set_'.$name;
        if(method_exists($this,$method_name) === true)
        {
            $this->$method_name($value);
        } 
        else
        {
            $this->_attributes[$name] = $value;
        }
    }

    public function __get($name)
    {
        $method_name = '_get_'.$name;
        if(method_exists($this,$method_name) === true)
        {
            return $this->$method_name();
        } 
        else
        {
            return $this->_attributes[$name];
        }
    }

    public function __isset($name)
    {
        $method_name = '_isset_'.$name;
        if(method_exists($this,$method_name) === true)
        {
            return $this->$method_name();
        } 
        else
        {
            return isset($this->_attributes[$name]);
        }
    }

    public function __unset($name)
    {
        $method_name = '_unset_'.$name;
        if(method_exists($self,$method_name) === true)
        {
            $this->$method_name();
        } 
        else
        {
            unset($this->_attributes[$name]);
        }
    }

    
    public function has_class($name)
    {
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        return in_array($name,$this->_attributes['class']);
    }

    public function remove_class($name)
    {
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $this->_attributes['class'] = array_diff($this->_attributes['class'], [$name]);
        return $this;
    }

    public function add_class($name)
    {
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $this->_attributes['class'][] = $name;
        return $this;
    }

    public function _get_class()
    {
        return implode(' ',array_unique($this->_attributes['class']));
    }

    public function _set_class($value)
    {
        $this->add_class($value);
    }

    protected function _build_attributes()
    {
        $html = '';
        foreach($this->_attributes as $key => $value)
        {
            $value = $this->__get($key);
            $html .= ' '.$key.'="'.$value.'"';
        }
        return $html;
    }

    function __toString()
    {
        if (is_null($this->_tag))
        {
            $html = $this->_pre_html;
            foreach($this->_children as $child)
            {
                $html .= (string) $child;
            }
        }
        else
        {
            $html = $this->_pre_html.'<'.$this->_tag.$this->_build_attributes();

            if(count($this->_children) == 0 and $this->_allow_quick_close === true)
            {
                $html .= ' />';
            }
            else
            {
                $html .= '>'.$this->_render_children().'</'.$this->_tag.'>';
            }
        }
        return $html.$this->_post_html;
    }

    protected function _render_children()
    {
        $html = $this->_pre_children_html;
        foreach($this->_children as $child)
        {
            $html .= (string) $child;
        }
        $html .= $this->_post_children_html;
        return $html;
    }

    public function add($new_child)
    {
        if (is_object($new_child))
        {
            $new_child->_parent = $this;
        }
        $this->_children[] = $new_child;
        return $this;
    }

    public function pull_right()
    {
        $this->add_class('pull-right');
        return $this;
    }

    public function pull_left()
    {
        $this->add_class('pull-left');
        return $this;
    }

    public function _set_modifier($new_modifier)
    {
        return $this->modifier($new_modifier);
    }

    public function _get_modifier()
    {
        $modifiers = ['default','active','success','warning','info','danger','secondary'];
        $class = $this->_attributes['class'];
        foreach($modifiers as $modifier)
        {
            if(in_array($this->_modifier_prefix.'-'.$modifier,$class))
            {
                return $modifier;
            }
        }
    }

    public function modifier($new_modifier)
    {
        if (is_null($this->_modifier_prefix))
        {
            throw new \Exception(get_class($this). ' does not support modifiers.');
        }
        $modifiers = ['default','active','success','warning','info','danger','secondary'];
        foreach($modifiers as $remove)
        {
            if ($new_modifier !== $remove)
            {
                $this->remove_class($this->_modifier_prefix.'-'.$remove);
            }
        }
        $this->add_class($this->_modifier_prefix.'-'.$new_modifier);
        return $this;
    }

    public function clear_modifier()
    {
        $modifiers = ['active','success','warning','info','danger','secondary'];
        foreach($modifiers as $remove)
        {
            $this->remove_class($this->_modifier_prefix.'-'.$remove);
        }
    }

    public function _set_size($new_size)
    {
        return $this->size($new_size);
    }

    public function _get_size()
    {
        $sizes = ['xs','sm','md','lg','xl'];
        $class = $this->_attributes['class'];
        foreach($sizes as $size)
        {
            if(in_array($this->_size_prefix.'-'.$size,$class))
            {
                return $size;
            }
        }
    }

    public function size($new_size)
    {
        if (is_null($this->_size_prefix))
        {
            throw new \Exception(get_class($this). ' does not support sizes.');
        }
        $sizes = ['xs','sm','md','lg','xl'];
        foreach($sizes as $remove)
        {
            if ($new_size !== $remove)
            {
                $this->remove_class($this->_size_prefix.'-'.$remove);
            }
        }
        $this->add_class($this->_size_prefix.'-'.$new_size);
        return $this;
    }

    public function _set_active($new_state)
    {
        if ($new_state === true)
        {
            $this->add_class('active');
        }
        else
        {
            $this->remove_class('active');
        }
        return $this;
    }

    public function _set_disabled($new_state)
    {
        if ($new_state === true)
        {
            $this->_attributes['disabled'] = 'disabled';
        }
        else
        {
            unset($this->_attributes['disabled']);
        }
        return $this;
    }

    public function _set_align($new_value)
    {
        $this->align($new_value);
    }

    function align($new_value)
    {
        if($new_value == 'left')
        {
            $this->remove_class('text-center');
            $this->remove_class('text-right');
        }
        else if ($new_value == 'center')
        {
            $this->add_class('text-center');
            $this->remove_class('text-right');
        }
        else if ($new_value == 'right')
        {
            $this->remove_class('text-center');
            $this->add_class('text-right');
        }
        return $this;
    }

    public function _set_grid_size($sizes=[])
    {
        $this->grid_size($sizes);
    }

    public function grid_size($new_sizes)
    {
        $sizes = ['xs','sm','md','lg','xl'];
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $classes = $this->_attributes['class'];
        foreach($classes as $class)
        {
            foreach($sizes as $size)
            {
                if (strpos($class,'col-'.$size.'-') !== false)
                {
                    $this->remove_class($class);
                }
            }
        }

        for($i=0; $i<count($new_sizes); $i++)
        {
            if (!is_null($new_sizes[$i]))
            {
                $this->add_class('col-'.$sizes[$i].'-'.$new_sizes[$i]);
            }
        }
        return $this;
    }

    public function _set_grid_offset($sizes=[])
    {
        $this->grid_size($sizes);
    }

    public function grid_offset($new_offsets)
    {
        $sizes = ['xs','sm','md','lg','xl'];
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $classes = $this->_attributes['class'];
        foreach($classes as $class)
        {
            foreach($sizes as $size)
            {
                if (strpos($class,'col-'.$size.'-offset-') !== false)
                {
                    $this->remove_class($class);
                }
            }
        }

        for($i=0; $i<count($new_offsets); $i++)
        {
            if (!is_null($new_offsets[$i]))
            {
                $this->add_class('col-'.$sizes[$i].'-offset-'.$new_offsets[$i]);
            }
        }
        return $this;
    }

    public function _set_grid_push($sizes=[])
    {
        $this->grid_size($sizes);
    }

    public function grid_push($new_pushes)
    {
        $sizes = ['xs','sm','md','lg','xl'];
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $classes = $this->_attributes['class'];
        foreach($classes as $class)
        {
            foreach($sizes as $size)
            {
                if (strpos($class,'col-'.$size.'-push-') !== false)
                {
                    $this->remove_class($class);
                }
            }
        }

        for($i=0; $i<count($new_pushes); $i++)
        {
            if (!is_null($new_pushes[$i]))
            {
                $this->add_class('col-'.$sizes[$i].'-push-'.$new_pushes[$i]);
            }
        }
        return $this;
    }

    public function _set_grid_pull($sizes=[])
    {
        $this->grid_size($sizes);
    }

    public function grid_pull($new_pulls)
    {
        $sizes = ['xs','sm','md','lg','xl'];
        if (!isset($this->_attributes['class']))
        {
            $this->_attributes['class'] = [];
        }
        $classes = $this->_attributes['class'];
        foreach($classes as $class)
        {
            foreach($sizes as $size)
            {
                if (strpos($class,'col-'.$size.'-pull-') !== false)
                {
                    $this->remove_class($class);
                }
            }
        }

        for($i=0; $i<count($new_pulls); $i++)
        {
            if (!is_null($new_pulls[$i]))
            {
                $this->add_class('col-'.$sizes[$i].'-pull-'.$new_pulls[$i]);
            }
        }
        return $this;
    }

    public function parent()
    {
        return $this->_parent;
    }

    public function tag()
    {
        return $this->_tag;
    }

    public function first_child()
    {
        return $this->_children[0];
    }

    public function last_child()
    {
        return $this->_children[(count($this->_children) - 1)];
    }

    public function nth_child($nbr)
    {
        return $this->_children[$nbr];
    }

    public function count_children()
    {
        return count($this->children);
    }
}
