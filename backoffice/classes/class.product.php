<?php

class Product {

  public static function add($post, $id_client) {

    Connexion::getInstance()->query("INSERT INTO product (ean_code, name, id_categorie, brand, link_image) "
            . " VALUES ('" . addslashes((int) $post['ean']) . "', '" . addslashes($post['name']) . "', '" . addslashes($post['categorie']) . "', '" . addslashes($post['brand']) . "', '" . addslashes($post['url']) . "') ");

    //get last insert
    Connexion::getInstance()->query("SELECT id_product FROM product WHERE ean_code = '" . addslashes((int) $post['ean']) . "' AND id_categorie = '" . addslashes($post['categorie']) . "' AND link_image = '" . addslashes($post['url']) . "' ");

    $id_product = Connexion::getInstance()->result();

    //insert into customer_product
    Connexion::getInstance()->query("INSERT INTO customer_product (id_customer, id_product) VALUES ('" . $id_client . "', '" . $id_product . "') ");
  }

  public static function get($id_client) {

    Connexion::getInstance()->query("SELECT p.*, c.name_categorie FROM product p"
            . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " WHERE cp.id_customer = '" . $id_client . "' ");

    return Connexion::getInstance()->fetchAll();
  }

}
