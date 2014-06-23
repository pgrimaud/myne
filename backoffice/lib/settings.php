<?php

session_start();
set_time_limit(300);

//defines
define('HOST', $_SERVER['HTTP_HOST']);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_BASE', 'myne');

define('ROOT_PATH', dirname(__FILE__) . '/../');
define('URL_VIEWS', ROOT_PATH . 'views/');
define('BACK_PATH', 'http://' . HOST);
define('APP_PATH', 'http://myne.bo');
define('DOMAIN', 'myne');
define('SITE', 'Myne Backoffice');

//functions
require_once ROOT_PATH . 'lib/functions.php';
spl_autoload_register('defaultAutoload');

//errors (prod only)
//register_shutdown_function('handleErrors');

//dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

//prod
//ini_set('display_errors', 0);
//error_reporting(E_NONE);
