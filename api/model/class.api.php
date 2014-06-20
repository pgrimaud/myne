<?php

Class Api{
  
  private $get = array();
  private $post = array();
  
  public function __constuct() {
    
    show($_SERVER);
    
    $this->get = $_GET;
		$this->post = $_POST;
		
		$request_method = $_SERVER['REQUEST_METHOD'];
		$this->params = explode('/', $_SERVER['REQUEST_URI']);
		
		if(isset($_GET)){
			$tmp = explode('?', $this->params[1]);
			$param = $tmp[0];
		}else{
			$param = $this->params[1];
		}
		
		$method = strtolower($request_method).ucwords($param);
			
		if(method_exists($this, $method)){
			$this->$method();
		}else{
			$this->error('Method '.$this->params[1].' doesn\'t exist');
		}
    
  }
  
  public function auth(){
    
  }
  
  
}