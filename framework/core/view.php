<?php

namespace framework\core;

class view
{
    protected $data;

    public function assign($name, $value)
    {
        if (is_array($name)) {
            $this->data = array_merge($this->data, $name);
        } else {
            $this->data[$name] = $value;
        }
    }

    public function display($view)
    {
        extract($this->data, EXTR_OVERWRITE);
        require_once VIEW_PATH . $view . '.html';
    }
}