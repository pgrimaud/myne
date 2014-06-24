<?php
include '../init.php';

if(isset($_POST["searchProduct"]) && $_POST["searchProduct"]) {
    $data = $_POST["data"];

    $product = ProductQuery::create();

    if(!is_numeric($data)) {
        $product = $product->filterByName($data);
    } else {
        if(strlen($data) != 13) {
            echo "KO";
            exit;
        } else {
            $product = $product->filterByEanCode($data);
        }
    }

    $product = $product->findOne();
    if(!$product) {
        echo "NOT FOUND";
        exit;
    } else {
        echo json_encode($product->toArray());
    }
}
