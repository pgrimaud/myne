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
  
  protected function EditAction($id_product){
    
    print_r($id_product);exit;
    
  }

}
