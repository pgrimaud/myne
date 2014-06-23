<?php

Class Api {

  private $get = array();
  private $post = array();
  private $headers = array();
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

    //content type
    foreach ($headers as $header) {
      if (strpos($header, 'Content-Type:')) {
        $this->headers['content'] = trim(str_replace('Content-Type:', '', $data[$header]));
      }
    }

    //if not content type
    if (!isset($this->headers['content']))
      $this->error('Missing Header Content-Type');
  }

  public function auth($headers) {

    $found = false;

    foreach ($headers as $header) {
      if (strpos($header, 'X-Myne-Token:')) {

        $found = true;

        Connexion::getInstance()->query("SELECT id_customer FROM `customer` WHERE api_token = '" . trim(str_replace('X-Myne-Token:', '', $header)) . "' ");
        $id = Connexion::getInstance()->result();

        if ((int) $id > 0)
          $this->id_client = $id;
        else
          $this->error('Invalid token');
      }
    }

    if ($found == false)
      $this->error('Invalid token');
  }

  public function error($message) {

    header("HTTP/1.0 404 Not Found");
    header("Content-type: text/xml; charset=utf-8");

    $xml = new SimpleXMLElement("<?xml version='1.0' ?>" . "\n" . "<error></error>");
    $xml->addChild('message', $message);

    echo $xml->asXML();

    exit;
  }

}
