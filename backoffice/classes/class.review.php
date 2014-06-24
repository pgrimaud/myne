<?php

Class Review {

  public static function get($id_client, $id_product = false, $orderby = false, $start = false, $limit = false) {
    $query = "SELECT r.*, p.*, c.name_categorie, u.first_name, u.last_name FROM review r"
            . " LEFT JOIN product p ON p.id_product = r.id_product"
            . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " LEFT JOIN user u ON u.id_user = r.id_user"
            . " WHERE cp.id_customer = '" . $id_client . "' ";

    $query .= ($id_product != false) ? " AND p.id_product = '" . $id_product . "' " : "";
    
    $query .= ($orderby != false) ? " ORDER BY " . $orderby." DESC " : "";
    $st = ($start != false) ? $start : 0;

    $query .= ($limit != false) ? " LIMIT " . $st . "," . $limit : " ";

    Connexion::getInstance()->query($query);

    return Connexion::getInstance()->fetchAll();
  }

  public static function averageRate($id_client, $id_product = false) {
    $query = "SELECT AVG(r.rate) FROM review r"
            . " LEFT JOIN product p ON p.id_product = r.id_product"
            . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " WHERE cp.id_customer = '" . $id_client . "' ";

    $query .= ($id_product != false) ? " AND p.id_product = '" . $id_product . "' " : "";

    Connexion::getInstance()->query($query);

    return Connexion::getInstance()->result();
  }

}
