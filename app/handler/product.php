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

if(isset($_POST["addProduct"]) && $_POST["addProduct"]) {
    $product = new Product();
    $product->setName($_POST["productName"])
            ->setEanCode($_POST["productEan"])
            ->save();

    // echo $product->getIdProduct();
    echo json_encode($product->toArray());
}
