<?php

namespace html;

class alert extends tag
{
    protected $_tag = 'div';
    protected $_modifier_prefix = 'alert';

    function defaults()
    {
        $this->role = 'alert';
        $this->add_class('alert');
        $this->closeable = true;
    }

    function _get_title()
    {
        # if this card doesn't have a header already, unshift it on to the start of the children array
        if (!isset($this->_children[0]) or $this->_children[0]->tag() == 'strong')
        {
            $title = new strong();
            $title->_parent = $this;
            array_unshift($this->_children,$title);
        }
        return $this->_children[0];
    }

    function _set_title($new_value)
    {
        $title = $this->_get_title();
        $title->add($new_value);
        $title->_post_html = $title->_post_html . ' ';
    }

    public function __toString()
    {
        if ($this->closeable === true)
        {
            $this->_pre_children_html = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
            $this->add_class('alert-dismissible');
            $this->add_class('fade');
            $this->add_class('in');
        }
        return parent::__toString();
    }
}
