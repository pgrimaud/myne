<?php

class ProductController extends FrontController {

  protected function AddAction() {

    Connexion::getInstance()->query("INSERT IGNORE INTO seller_product (id_seller, id_product) VALUES ('" . $this->client->getID() . "', '" . $this->post_data['value'] . "') ");

    exit;
  }
  
  protected function DeleteAction(){
    Connexion::getInstance()->query("DELETE FROM seller_product WHERE id_seller = '".$this->client->getID()."' AND id_product = '".$this->post_data['id']."' ");
    exit;
  }

}
