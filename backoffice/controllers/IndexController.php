<?php

class IndexController extends FrontController {

  protected function IndexAction() {
    $this->data->kpi['sum_products'] = sizeof(Product::get($this->client->getID()));
    $this->data->kpi['sum_reviews'] = sizeof(Review::get($this->client->getID()));
    $this->data->kpi['sum_comments'] = sizeof(Comment::get($this->client->getID()));
    $this->data->kpi['average_rate'] = (float) round(Review::averageRate($this->client->getID()), 2);

    //color
    $this->data->color = array('error', 'error', 'warning', 'warning', 'success', 'success');

    //last reviews
    $this->data->last_reviews = Review::get($this->client->getID(), false, 'r.`date`', '0', '5');

    //last commentaires
  }

  protected function LogoutAction() {

    session_unset();
    session_destroy();

    header('Location:/');
    exit;
  }

}
