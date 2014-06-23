<?php

function defaultAutoload($class_name) {

  if ((file_exists(ROOT_PATH . 'controllers/' . $class_name . '.php'))):
    require_once ROOT_PATH . 'controllers/' . $class_name . '.php';
  elseif ((file_exists(ROOT_PATH . 'classes/class.' . strtolower($class_name) . '.php'))):
    require_once ROOT_PATH . 'classes/class.' . strtolower($class_name) . '.php';
  else:
    throw new Exception($class_name . ' does not exist.', 404);
  endif;
}

function add($fileName) {

  global $controller, $utilisateur;

  try {

    if (!is_file(ROOT_PATH . 'views/extends/' . $fileName . '.php'))
      throw new Exception('File views/extends/' . $fileName . '.php does not exist in ' . realpath($controller->getView()), 404);
    else
      include_once ROOT_PATH . 'views/extends/' . $fileName . '.php';
  } catch (Exception $e) {

    $controller->setMessage($e->getMessage());
    include_once ROOT_PATH . 'views/extends/error.php';
  }
}

function show($value) {

  echo '<pre>';
  print_r($value);
  echo '</pre>';
  exit;
}

function handleErrors() {

  $types = array(
      E_WARNING,
      E_ERROR,
      E_USER_ERROR,
      E_USER_WARNING,
      E_PARSE
  );

  $error = error_get_last();

  if ($error !== NULL && in_array($error['type'], $types)) {
    array_unshift($error, date('d/m/Y H:i:s'));
    error_log(implode(';', $error) . "\r\n", 3, ROOT_PATH . 'lib/logs/errors.csv');
  }
}
