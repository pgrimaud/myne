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

    $header = ($this->headers['content'] == 'json') ? 'Content-type: text/json;' : 'Content-type: text/xml; charset=utf-8';
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
  }

}
