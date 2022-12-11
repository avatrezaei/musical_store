<?php

use Core\Router;
use Core\Database;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ .'/../config/config.php';
require_once __DIR__ .'/../app/helpers.php';


$router = new Router;
$router->run();



