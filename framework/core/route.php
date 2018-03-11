<?php

namespace framework\core;

class route
{
    public $namespace;
    public $controller;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/') {
            $info = parse_url($_SERVER['REQUEST_URI']);
            $pathArray = explode('/', trim($info['path'], '/'));
            $this->namespace = 'application\\controllers\\';
            $this->controller = $pathArray[0] ?? 'index';
            $this->action = $pathArray[1] ?? 'index';
            for ($i = 2; $i < count($pathArray); $i += 2) {
                if (isset($pathArray[$i + 1])) {
                    $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                }
            }
        } else {
            $this->namespace = 'application\\controllers\\';
            $this->controller = 'index';
            $this->action = 'index';
        }
    }
}