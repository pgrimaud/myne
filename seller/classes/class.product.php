<?php

class Product {

  public static function add($post, $id_client) {

    Connexion::getInstance()->query("INSERT INTO product (ean_code, name, id_categorie, brand, link_image) "
            . " VALUES ('" . addslashes($post['ean']) . "', '" . addslashes($post['name']) . "', '" . addslashes($post['categorie']) . "', '" . addslashes($post['brand']) . "', '" . addslashes($post['url']) . "') ");

//get last insert
    Connexion::getInstance()->query("SELECT id_product FROM product WHERE ean_code = '" . addslashes($post['ean']) . "' AND id_categorie = '" . addslashes($post['categorie']) . "' AND link_image = '" . addslashes($post['url']) . "' ");

    $id_product = Connexion::getInstance()->result();

//insert into customer_product
    Connexion::getInstance()->query("INSERT INTO customer_product (id_customer, id_product) VALUES ('" . $id_client . "', '" . $id_product . "') ");
  }

  public static function get($id_client, $id_product = false) {

    $query = "SELECT p.*, c.name_categorie FROM product p"
            . " LEFT JOIN seller_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " WHERE cp.id_seller = '" . $id_client . "' ";

    $query .= ($id_product != false) ? " AND p.id_product = '" . $id_product . "' " : "";

    Connexion::getInstance()->query($query);

    return Connexion::getInstance()->fetchAll();
  }

  public static function topProducts($id_client) {

    $query = "SELECT p.*, COUNT(r.id_review) as nb_review, AVG(r.rate) as rate, c.name_categorie FROM product p"
            . " LEFT JOIN seller_product cp ON p.id_product = cp.id_product"
            . " LEFT JOIN categorie c ON c.id_categorie = p.id_categorie"
            . " LEFT JOIN review r ON r.id_product = p.id_product"
            . " WHERE cp.id_seller = '" . $id_client . "'"
            . " GROUP BY p.id_product ORDER BY nb_review DESC LIMIT 0,3 ";

    Connexion::getInstance()->query($query);

    return Connexion::getInstance()->fetchAll();
  }

  public static function checkProduct($id_product, $id_client) {

    Connexion::getInstance()->query("SELECT id_product FROM seller_product WHERE id_product = '" . $id_product . "' AND id_seller = '" . $id_client . "' ");

    if ((int) Connexion::getInstance()->result() > 0)
      return true;
    else
      return false;
  }

  public static function update($post, $id_client) {

    if (Product::checkProduct($post['id_product'], $id_client)) {
      Connexion::getInstance()->query("UPDATE product SET ean_code = '" . addslashes($post['ean']) . "', name = '" . addslashes($post['name']) . "', id_categorie = '" . addslashes($post['categorie']) . "', brand = '" . addslashes($post['brand']) . "', link_image = '" . addslashes($post['url']) . "' WHERE id_product = '" . $post['id_product'] . "' ");
    }
  }

  public static function delete($id_product, $id_client) {

    Connexion::getInstance()->query("DELETE FROM seller_product WHERE id_product = '" . $id_product . "' AND id_seller = '" . $id_client . "' ");
  }

}
