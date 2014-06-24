<?php

class IndexController extends FrontController {

  protected function IndexAction() {

    $products = Product::get($this->client->getID());
    $reviews = Review::get($this->client->getID());
    $comments = Comment::get($this->client->getID());
    
    //for amcharts
    $this->data->chart['review'] = Statistic::amchartsDisplay($reviews, 'review');
    $this->data->chart['comment'] = Statistic::amchartsDisplay($comments, 'comment');
    
    $this->data->kpi['sum_products'] = sizeof($products);
    $this->data->kpi['sum_reviews'] = sizeof($reviews);
    $this->data->kpi['sum_comments'] = sizeof($comments);
    $this->data->kpi['average_rate'] = (float) round(Review::averageRate($this->client->getID()), 2);

    //color
    $this->data->color = array('error', 'error', 'warning', 'warning', 'success', 'success');

    //last reviews
    $this->data->last_reviews = Review::get($this->client->getID(), false, 'r.`date`', '0', '3');

    //top products
    $this->data->top_products = Product::topProducts($this->client->getID());
  }

  protected function LogoutAction() {

    session_unset();
    session_destroy();

    header('Location:/');
    exit;
  }

}
