<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Définition du répertoire de base du projet
define('BASEDIR', dirname(__FILE__));

// inclure le script Propel principal
//require_once 'propel/Propel.php';
require_once 'propel/runtime/lib/Propel.php';

// Initialisation de Propel avec la configuration du runtime
Propel::init(BASEDIR . DIRECTORY_SEPARATOR . 'build' . DIRECTORY_SEPARATOR . 'conf' . DIRECTORY_SEPARATOR . 'myne-conf.php');

// Ajout du dossier des classes générées dans l'include path
set_include_path(BASEDIR . DIRECTORY_SEPARATOR . 'build' . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
