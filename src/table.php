<?php

namespace html;

class table extends tag
{
    protected $_tag = 'table';

    public function defaults()
    {
        $this->add_class('table');
        $this->add(new thead());
        $this->_children[0]->add(new table_row());
        $this->add(new tbody());
    }

    public function _get_head()
    {
        return $this->_children[0]->_children[0];
    }

    public function _get_body()
    {
        return $this->_children[1];
    }

    public function get_row($row)
    {
        return $this->body->_children[$row];
    }

    public function get_cell($row,$col)
    {
        return $this->body->_children[$row]->_children[$col];
    }

    public function import_data($iterable_obj,$column_order = null)
    {
        return $this->body->import_data($iterable_obj,$column_order);
    }

    public function __toString()
    {
        if ($this->inverse === true)
        {
            $this->add_class('table-inverse');
        }
        unset($this->inverse);

        if ($this->striped === true)
        {
            $this->add_class('table-striped');
        }
        unset($this->striped);

        if ($this->bordered === true)
        {
            $this->add_class('table-bordered');
        }
        unset($this->bordered);

        if ($this->hover === true)
        {
            $this->add_class('table-hover');
        }
        unset($this->hover);

        if ($this->responsive === true)
        {
            $this->_pre_html = '<div class="table-responsive">';
            $this->_post_html = '</div>';
        }
        unset($this->responsive);
        
        return parent::__toString();
    }
}
