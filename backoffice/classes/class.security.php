<?php

class Security {

  public static function isLogged() {
    Security::login();
  }

  private static function login() {

    $client = new Login(addslashes($_POST['login']), addslashes($_POST['password']));
    if ($client->identification()) {
      $_SESSION['login'] = $client->getLogin();
    }
  }

  public static function logout() {

    session_unset();
    session_destroy();

    header('Location:' . APP_PATH);
    exit;
  }

  public static function isAdmin() {

    //for crons
    if (php_sapi_name() == 'cli')
      return true;

    $ips_ok = array('127.0.0.1', '80.13.151.111', '81.64.143.61');

    if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], $ips_ok))
      return true;

    return false;
  }

}
