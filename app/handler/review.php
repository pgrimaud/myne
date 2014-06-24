<?php
include '../init.php';

if(isset($_POST["addReview"]) && $_POST["addReview"]) {
    $review = new Review();
    $review->setIdUser(1) // TOFIX
        ->setIdProduct($_POST["idProduct"])
        ->setTitle($_POST["reviewTitle"])
        ->setContent($_POST["reviewContent"])
        ->setRate($_POST["reviewRate"])
        ->setPublication($_POST["reviewPublication"])
        ->setDate("now")
        ->save();
}
