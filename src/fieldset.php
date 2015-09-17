<?php

namespace html;

class fieldset extends tag
{
    protected $_tag = 'fieldset';

    function defaults()
    {
        $this->add_class('form-group');
    }

    function _get_legend()
    {
        # if this fieldset doesn't have a legend already, unshift it on to 
        # the start of the children array
        if (!isset($this->_children[0]) or $this->_children[0]->_tag === 'legend')
        {
            $legend = new legend();
            $legend->_parent = $this;
            array_unshift($this->_children,$legend);
        }
        return $this->_children[0];
    }

    function _set_legend($new_legend)
    {
        $legend = $this->_get_legend();
        $legend->add($new_legend);
    }
}
