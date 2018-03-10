<?php
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', __DIR__ . DS . 'application' . DS);
define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
define('CONF_PATH', ROOT_PATH . 'config' . DS);
define('VIEW_PATH', APP_PATH . 'views' . DS);

require_once 'vendor/autoload.php';
require_once 'framework\core\framework.php';
framework\core\framework::run();

