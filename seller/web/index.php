<?php

/* Myne Backoffice */

require_once '../lib/settings.php';

if (isset($_POST['login']) && isset($_POST['password'])):

  Security::isLogged();

  header('Location: ' . APP_PATH);

endif;

if (!isset($_SESSION['login'])):

  if ($_SERVER['REQUEST_URI'] != '/')
    header('Location: ' . APP_PATH);

  add('login');

else:

  $customer = new Client($_SESSION['login']);

  $frontController = new FrontController($customer);
  $controller = $frontController->getChildController();
  include_once $controller->getView();
  
endif;
