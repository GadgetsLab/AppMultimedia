<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)).DS);
define('RESOURCE', ROOT.'..'.DS.'resource'. DS);

require_once '../bootstrap/app.php';
require_once '../src/routes.php';
$whoops = new \Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
$whoops->register();
$app->run();
