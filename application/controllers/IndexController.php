<?php

namespace application\controllers;

use framework\core\controller;

class IndexController extends controller
{
    public function index()
    {
        $data = 'welcome use tiny php framework';
        $this->assign('data', $data);
        $this->display('index/index');
    }
}