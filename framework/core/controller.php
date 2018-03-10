<?php

namespace framework\core;

class controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new view();
    }

    public function assign($name, $value)
    {
        $this->view->assign($name, $value);
    }

    public function display($view)
    {
        $this->view->display($view);
    }
}