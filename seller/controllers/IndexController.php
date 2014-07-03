<?php

class IndexController extends FrontController {

  protected function IndexAction() {

    $this->data->products = Product::get($this->client->getID());
  }

  protected function SearchproductAction() {

    $v = $this->post_data['value'];

    Connexion::getInstance()->query("SELECT DISTINCT(name) as q, p.* FROM product p WHERE (ean_code LIKE '%" . $v . "%' OR name LIKE '%" . $v . "%' OR brand LIKE '%" . $v . "%')"
            . " GROUP BY name LIMIT 0,5  ");
    $this->data->results = Connexion::getInstance()->fetchAll();
  }

  protected function LoadproductAction() {

    $this->data->products = Product::get($this->client->getID());
  }

  protected function LogoutAction() {

    session_unset();
    session_destroy();

    header('Location:/');
    exit;
  }

}
