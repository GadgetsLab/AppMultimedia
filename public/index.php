<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)).DS);
define('RESOURCE', ROOT.'..'.DS.'resource'. DS);

require_once '../bootstrap/app.php';
require_once '../src/routes.php';
$app->run();
