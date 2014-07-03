<?php

class ProductController extends FrontController {

  protected function AddAction() {

    Connexion::getInstance()->query("INSERT IGNORE INTO seller_product (id_seller, id_product) VALUES ('" . $this->client->getID() . "', '" . $this->post_data['value'] . "') ");

    exit;
  }

  protected function DeleteAction() {
    Connexion::getInstance()->query("DELETE FROM seller_product WHERE id_seller = '" . $this->client->getID() . "' AND id_product = '" . $this->post_data['id'] . "' ");
    exit;
  }

  protected function ShowAction($id_product) {
    //color
    $this->data->color = array('error', 'error', 'warning', 'warning', 'success', 'success');

    //product
    $this->data->id = $id_product;
    $this->data->product = Product::get($this->client->getID(), $id_product);
    $this->data->categories = Categorie::getCategories();

    //Review
    $this->data->reviews = Review::get($this->client->getID(), $id_product);
    if (sizeof($this->data->reviews) > 0) {
      $this->data->comments = array();
      foreach ($this->data->reviews as $review) {
        $this->data->comments[$review['id_review']] = Comment::getFromReview($this->client->getID(), $review['id_review']);
      }
    }
  }

}
