<?php

namespace html;

class card extends tag
{
    protected $_tag = 'div';
    protected $_modifier_prefix = 'card';

    function defaults()
    {
        $this->add_class('card');
    }

    function _get_header()
    {
        # if this card doesn't have a header already, unshift it on to the start of the children array
        if (!isset($this->_children[0]) or $this->_children[0]->has_class('card-header') === false)
        {
            $header = new card_header();
            $header->_parent = $this;
            array_unshift($this->_children,$header);
        }
        return $this->_children[0];
    }

    function _set_header($new_value)
    {
        $header = $this->_get_header();
        $header->add($new_value);
    }

    function _get_footer()
    {
        # if this card doesn't have a header already, unshift it on to the start of the children array
        if (!isset($this->_children[0]) or $this->_children[(count($this->_children) - 1)]->has_class('card-footer') === false)
        {
            $footer = new card_footer();
            $footer->_parent = $this;
            $this->_children[] = $footer;
        }
        return $this->_children[(count($this->_children) - 1)];
    }

    function _set_footer($new_value)
    {
        $footer = $this->_get_footer();
        $footer->add($new_value);
    }
    public function __toString()
    {
        if($this->inverse === true)
        {
            $this->add_class('card-inverse');
        }
        unset($this->inverse);

        return parent::__toString();
    }
}
