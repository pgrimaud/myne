<?php
// This file generated by Propel 1.6.8 convert-conf target
// from XML runtime conf file /var/www/myne/app/runtime-conf.xml
$conf = array (
  'datasources' =>
  array (
    'myne' =>
    array (
      'adapter' => 'mysql',
      'connection' =>
      array (
        'dsn' => 'mysql:host=localhost;dbname=myne',
        'user' => 'user',
        'password' => '',
        'settings' =>
        array (
          'charset' =>
          array (
            'value' => 'utf8',
          ),
        ),
        'options' =>
        array (
          'MYSQL_ATTR_INIT_COMMAND' =>
          array (
            'value' => 'SET NAMES utf8 COLLATE utf8_unicode_ci',
          ),
        ),
      ),
    ),
    'default' => 'myne',
  ),
  /*'log' =>
  array (
    'type' => 'file',
    'name' => '/var/www/log/propel.log',
    'ident' => 'propel',
    'level' => '7',
  ),*/
  'generator_version' => '1.6.8',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-myne-conf.php');
return $conf;
