<?php

class ProductController extends FrontController {

  protected function AllAction() {

    $this->data->products = Product::get($this->client->getID());
  }

  protected function AddAction() {

    $this->data->categories = Categorie::getCategories();
  }

  protected function RecordAction() {

    if (isset($_POST)) {
      Product::add($_POST, $this->client->getID());
    }

    header('Location:/product/all/');

    exit;
  }

  protected function EditAction($id_product) {

    if (!Product::checkProduct($id_product, $this->client->getID())) {
      header('Location:/product/all/');
    } else {
      $this->data->categories = Categorie::getCategories();
      $this->data->product = Product::get($this->client->getID(), $id_product);
    }
  }

  protected function UpdateAction() {

    if (isset($_POST)) {
      Product::update($_POST, $this->client->getID());
    }

    header('Location:/product/all/');

    exit;
  }

  protected function DeleteAction($id_product) {
    if (!Product::checkProduct($id_product, $this->client->getID())) {
      
    } else {
      Product::delete($id_product, $this->client->getID());
    }
    header('Location:/product/all/');
    exit;
  }

  protected function DetailAction($id_product) {
    if (!Product::checkProduct($id_product, $this->client->getID())) {
      header('Location:/product/all/');
      exit;
    } else {

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

}
