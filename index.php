<?php

ini_set('display_errors', 0);
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/core/Autoloader.php');

$router = new Router();
$router->run();
