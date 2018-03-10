<?php

namespace framework\core;

class config
{
    public static function get($file, $value = null)
    {
        $file = CONF_PATH . $file . '.php';
        if (is_file($file)) {
            $data = require_once $file;
            if ($value === null) {
                return $data;
            }
            return $data[$value] ?? null;
        }
        return null;
    }
}