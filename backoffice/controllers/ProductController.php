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

}
