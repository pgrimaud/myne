<?php

class IndexController extends FrontController {

  protected function IndexAction() {
    
  }

  protected function LogoutAction() {

    session_unset();
    session_destroy();

    header('Location:/');
    exit;
  }

}
