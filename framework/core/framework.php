<?php

namespace framework\core;

use application\controllers\errorController;

class framework
{
    public static function run()
    {

        self::init();

        self::autoload();

        self::dispatch();

    }


    private static function init()
    {

    }


    private static function autoload()
    {
        spl_autoload_register(function ($class) {
            $class = str_replace('\\', '/', $class);
            $class = $class . '.php';
            if (is_file($class)) {
                require_once $class;
            } else {
                throw new \Exception("$class  not find");
            }
        });
    }


    private static function dispatch()
    {
        $route = new route();
        $action = $route->action;
        $class = $route->namespace . $route->controller . 'Controller';
        if (is_file($class . '.php')) {
            $controller = new $class();
            $controller->$action();
        } else {
            $controller = new errorController();
            $controller->error();
        }
    }

}