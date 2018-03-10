<?php

namespace framework\core;

class route
{
    public $namespace;
    public $controller;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            $pathArray = explode('/', trim($uri, '/'));
            $this->namespace = 'application\\controllers\\';
            $this->controller = $pathArray[0] ?? 'indexController';
            $this->action = $pathArray[1] ?? 'index';
            for ($i = 2; $i < count($pathArray); $i += 2) {
                if (isset($pathArray[$i + 1])) {
                    $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                }
            }
        } else {
            $this->namespace = 'application\\controllers\\';
            $this->controller = 'indexController';
            $this->action = 'index';
        }
    }
}