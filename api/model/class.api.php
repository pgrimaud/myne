<?php

Class Api {

  private $get = array();
  private $post = array();
  private $headers = array('content' => '');
  private $params;
  private $id_client;
  private $export = '';

  public function __construct() {

    $this->setHeaders();

    $this->get = $_GET;
    $this->post = $_POST;

    $request_method = $_SERVER['REQUEST_METHOD'];
    $this->params = explode('/', $_SERVER['REQUEST_URI']);

    if (isset($_GET)) {
      $tmp = explode('?', $this->params[1]);
      $param = $tmp[0];
    } else {
      $param = $this->params[1];
    }

    $method = strtolower($request_method) . ucwords($param);

    if (method_exists($this, $method)) {
      $this->$method();
    } else {
      $this->error('Method ' . $this->params[1] . ' doesn\'t exist');
    }
  }

  public function setHeaders() {

    $headers = headers_list();

    //auth first
    $this->auth($headers);

    //datatype
    $data = array('application/xml' => 'xml', 'application/json' => 'json');

    if (isset($_SERVER['CONTENT_TYPE'])) {
      if (isset($data[$_SERVER['CONTENT_TYPE']])) {
        $this->headers['content'] = $data[$_SERVER['CONTENT_TYPE']];
      } else {
        $this->error('Unknow Header Content-Type');
      }
    } else {
      $this->error('Missing Header Content-Type');
    }
  }

  public function auth($headers) {

    if (isset($_SERVER['HTTP_X_MYNE_TOKEN'])) {

      Connexion::getInstance()->query("SELECT id_customer FROM `customer` WHERE api_token = '" . addslashes($_SERVER['HTTP_X_MYNE_TOKEN']) . "' ");

      $id = Connexion::getInstance()->result();

      if ((int) $id > 0)
        $this->id_client = $id;
      else
        $this->error('Invalid token');
    }else {

      $this->error('Invalid token');
    }
  }

  public function error($message) {

    header("HTTP/1.0 404 Not Found");

    if ($this->headers['content'] == 'json') {

      $this->returnData(json_encode(array('error' => array('error' => $message))));
    } else {

      $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<error></error>");
      $xml->addChild('message', $message);

      $this->returnData($xml->asXML());
    }
    exit;
  }

  public function returnData($data) {

    $header = ($this->headers['content'] == 'json') ? 'Content-type: text/json' : 'Content-type: text/xml; charset=utf-8';
    header($header);

    echo $data;
    exit;
  }

  public function getProducts() {

    Connexion::getInstance()->query("SELECT p.id_product as SKU, p.ean_code, p.name FROM product p"
            . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product "
            . " LEFT JOIN customer c ON c.id_customer = cp.id_customer"
            . " WHERE c.id_customer = '" . $this->id_client . "' ");

    $products = Connexion::getInstance()->fetchAll();

    if (sizeof($products) > 0) {

      if ($this->headers['content'] == 'xml') {

        $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<products></products>");
        foreach ($products as $product) {
          $prod = $xml->addChild('product');
          foreach ($product as $field => $value)
            $prod->addChild($field, $value);
        }
        $this->returnData($xml->asXML());
      } else {

        $this->returnData(json_encode(array('products' => $products)));
      }
    } else {

      $this->error('No products available');
    }
  }

  public function getProduct() {

    if (isset($this->params[2]) && $this->params[2]) {

      Connexion::getInstance()->query("SELECT p.id_product as SKU, p.ean_code, p.name FROM product p"
              . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product "
              . " LEFT JOIN customer c ON c.id_customer = cp.id_customer"
              . " WHERE c.id_customer = '" . $this->id_client . "' "
              . " AND p.id_product = '" . addslashes($this->params[2]) . "' ");

      $product = Connexion::getInstance()->fetch();

      if (isset($product['SKU'])) {

        if ($this->headers['content'] == 'xml') {

          $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<product></product>");
          foreach ($product as $field => $value)
            $xml->addChild($field, $value);

          $this->returnData($xml->asXML());
        } else {

          $this->returnData(json_encode(array('product' => $product)));
        }
      } else {
        $this->error('No product available with :idproduct ' . addslashes($this->params[2]));
      }
    } else {
      $this->error('Missing parameter :idproduct');
    }
  }

  public function getReviews() {

    if (isset($this->get['id_product']) && $this->get['id_product']) {
      Connexion::getInstance()->query("SELECT p.id_product FROM product p"
              . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product "
              . " LEFT JOIN customer c ON c.id_customer = cp.id_customer"
              . " WHERE c.id_customer = '" . $this->id_client . "' "
              . " AND p.id_product = '" . addslashes($this->get['id_product']) . "' ");

      $id = Connexion::getInstance()->result();
      if ((int) $id > 0) {

        Connexion::getInstance()->query("SELECT r.id_review, r.content, r.rate, r.date, u.id_facebook, u.first_name, u.last_name FROM review r"
                . " LEFT JOIN product p ON r.id_product = p.id_product"
                . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product "
                . " LEFT JOIN customer c ON c.id_customer = cp.id_customer"
                . " LEFT JOIN user u ON r.id_user = u.id_user"
                . " WHERE c.id_customer = '" . $this->id_client . "'"
                . " AND p.id_product = '" . addslashes($this->get['id_product']) . "' ");

        $reviews = Connexion::getInstance()->fetchAll();

        if (sizeof($reviews) > 0) {


          if ($this->headers['content'] == 'xml') {

            $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<reviews></reviews>");
            foreach ($reviews as $review) {
              $revi = $xml->addChild('review');
              foreach ($review as $field => $value)
                $revi->addChild($field, $value);
            }
            $this->returnData($xml->asXML());
          } else {

            $this->returnData(json_encode(array('reviews' => $reviews)));
          }
        } else {
          $this->error('No reviews available');
        }
      } else {
        $this->error('No product available with :idproduct ' . addslashes($this->params[2]));
      }
    } else {
      $this->error('Missing parameter :id_product');
    }
  }

  public function getReview() {

    if (isset($this->params[2]) && $this->params[2]) {
      Connexion::getInstance()->query("SELECT r.id_review, r.content, r.rate, r.date, u.id_facebook, u.first_name, u.last_name FROM review r"
              . " LEFT JOIN product p ON r.id_product = p.id_product"
              . " LEFT JOIN customer_product cp ON p.id_product = cp.id_product "
              . " LEFT JOIN customer c ON c.id_customer = cp.id_customer"
              . " LEFT JOIN user u ON r.id_user = u.id_user"
              . " WHERE c.id_customer = '" . $this->id_client . "'"
              . " AND r.id_review = '" . addslashes($this->params[2]) . "' ");

      $review = Connexion::getInstance()->fetch();

      if (isset($review['id_review'])) {

        if ($this->headers['content'] == 'xml') {

          $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<review></review>");
          foreach ($review as $field => $value)
            $xml->addChild($field, $value);

          $this->returnData($xml->asXML());
        } else {

          $this->returnData(json_encode(array('review' => $review)));
        }
      } else {
        $this->error('No review available with :id_review ' . addslashes($this->params[2]));
      }
    }
  }
}
