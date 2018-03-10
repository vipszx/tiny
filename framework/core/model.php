<?php

namespace framework\core;

use Medoo\Medoo;

class model extends Medoo
{
    public function __construct($options = null)
    {
        $options = config::get('database');
        parent::__construct($options);
    }
}