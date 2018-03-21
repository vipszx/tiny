<?php

namespace framework\core;

class model extends medoo
{
    public function __construct($options = null)
    {
        $options = config::get('database');
        if (!$this->table) {
            $class_name = basename(get_called_class());
            $this->table = parse_name(substr($class_name, 0, -5));
        }
        parent::__construct($options);
    }
}