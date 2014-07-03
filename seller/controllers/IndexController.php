<?php

class IndexController extends FrontController {

  protected function IndexAction() {

    $this->data->products = Product::get($this->client->getID());
  }

  protected function LogoutAction() {

    session_unset();
    session_destroy();

    header('Location:/');
    exit;
  }

}
