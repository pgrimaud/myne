<?php

class Client {

  public $mail;
  public $infos;

  public function __construct($mail) {

    $this->mail = $mail;

    Connexion::getInstance()->query("SELECT * FROM customer WHERE email = '" . $mail . "' ");
    $infos = Connexion::getInstance()->fetchObject();

    $this->infos = $infos;
  }

  public function getID() {
    return $this->infos->id_customer;
  }

  public function getMail() {
    return $this->infos->mail;
  }

}

?>
