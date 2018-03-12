<?php

namespace framework\core;

class controller
{
    protected $view;
    protected $request;

    public function __construct()
    {
        $this->view = new view();
        $this->request = new request();
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