<?php
define('BASE_URL',    'http://localhost/myne/app'); // url de l'environnement de dev
//define('BASE_URL',    'https://appfanlikeyou.com/myne/app'); // url de l'environnement de prod

define('LIB_URL',   BASE_URL.'/lib');
define('VIEW_URL',  BASE_URL.'/view');

define('LIB_DIR',   dirname(__FILE__));
define('BASE_DIR',  dirname(__FILE__).'/../');
define('VIEW_DIR',  dirname(__FILE__).'/../view/');

//demo dependencies
define('CURRENT_USER', 1);