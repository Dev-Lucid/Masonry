<?php

namespace html;

class definition_item extends tag
{
    protected $_tag = null;

    public function __toString()
    {
        $this->add(new definition_term1($this->term));
        unset($this->term);

        $this->add(new definition_term2($this->definition));
        unset($this->definition);

        if (isset($this->definition_alt1))
        {
            $def = new definition_term2($this->definition_alt1);
            $def->add_class('col-sm-offset-3');
            $this->add($def);
            unset($this->definition_alt1);
        }
        
        if (isset($this->definition_alt2))
        {
            $def = new definition_term2($this->definition_alt2);
            $def->add_class('col-sm-offset-3');
            $this->add($def);
            unset($this->definition_alt2);
        }

        return parent::__toString();
    }
}

class definition_term1 extends tag
{
    protected $_tag = 'dt';

    public function defaults()
    {
        $this->add_class('col-sm-3');
    }
}

class definition_term2 extends tag
{
    protected $_tag = 'dd';

    public function defaults()
    {
        $this->add_class('col-sm-9');
    }
}

