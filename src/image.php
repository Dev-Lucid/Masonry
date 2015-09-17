<?php

namespace html;

class image extends tag
{
    protected $_tag = 'img';

    public function defaults()
    {
        $this->_allow_quick_close = true;
    }

    public function __toString()
    {
        if ($this->responsive === true)
        {
            $this->add_class('img-responsive');
        }
        unset($this->responsive);

        if ($this->rounded === true)
        {
            $this->add_class('img-rounded');
        }
        unset($this->rounded);

        if ($this->circle === true)
        {
            $this->add_class('img-circle');
        }
        unset($this->circle);

        if ($this->thumbnail === true)
        {
            $this->add_class('img-thumbnail');
        }
        unset($this->thumbnail);

        if ($this->center_block === true)
        {
            $this->add_class('center-block');
        }
        unset($this->center_block);

        if ($this->text_center === true)
        {
            $this->_pre_html  .= '<div class="text-center">';
            $this->_post_html .= '</div>';
        }
        unset($this->text_center);

        
        return parent::__toString();
    }
}
