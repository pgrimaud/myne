<?php

Class Comment{
  
  public static function get($id_client, $id_product = false) {
    $query = "SELECT com.*, c.name_categorie FROM comment com"
            . " LEFT JOIN review r ON com.id_review = r.id_review"
            . " LEFT JOIN product p ON p.id_product = r.id_product"
            . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " WHERE cp.id_customer = '" . $id_client . "' ";

    $query .= ($id_product != false) ? " AND p.id_product = '" . $id_product . "' " : "";

    Connexion::getInstance()->query($query);

    return Connexion::getInstance()->fetchAll();
  }
  
}

