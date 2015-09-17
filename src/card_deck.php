<?php

namespace html;

class card_deck extends tag
{
    protected $_tag = 'div';

    function defaults()
    {
        $this->add_class('card-deck');
        $this->_pre_html = '<div class="card-deck-wrapper">';
        $this->_post_html = '</div>';
    }
}
