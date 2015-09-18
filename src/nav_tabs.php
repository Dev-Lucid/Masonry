<?php

namespace html;

class nav_tabs extends tag
{
    protected $_tag  = 'ul';
    protected $tabs = [];


    public function defaults()
    {
        $this->add_class('nav');
        $this->add_class('nav-tabs');
        $this->role = 'tablist';
        $this->active_tab = 0;
    }

    public function __toString()
    {
        $this->_children[$this->active_tab]->add_class('active');
        $this->tabs[$this->active_tab]->add_class('in');
        $this->tabs[$this->active_tab]->add_class('active');
        unset($this->active_tab);

        $this->_post_html .= '<div class="tab-content">';
        foreach($this->tabs as $tab)
        {
            $this->_post_html .= (string) $tab;
        }
        $this->_post_html .= '</div>';


        return parent::__toString();
    }

    public function add_tab($name,$label,$panel)
    {
        $this->add(new nav_tab_label(['text'=>$label]));
        $this->last_child()->href='#'.$name;
        $panel->_parent = $this;
        $panel->id = $name;
        $this->tabs[] = $panel;
    }
}
