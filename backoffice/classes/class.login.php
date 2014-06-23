<?php

class Login {

  private $login;
  private $password;

  public function __construct($login, $pass) {
    $this->login = $login;
    $this->password = $pass;
  }

  public function identification() {

    $this->password = md5($this->password . '+!yolomyneturborush1234');

    Connexion::getInstance()->query("SELECT name FROM customer
                    WHERE email = '" . $this->login . "'
                    AND password = '" . $this->password . "' ");

    $nom = Connexion::getInstance()->result();

    if ($nom)
      return true;
    else
      return false;
  }

  public function getLogin() {
    return $this->login;
  }

  public function getPass() {
    return $this->password;
  }

}

?>
