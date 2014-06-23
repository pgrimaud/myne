<?php

Class Api {

  private $get = array();
  private $post = array();
  private $params;

  public function __construct() {

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

  public function auth() {
    
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
