<?php
include '../init.php';

$comment = new Comment();
$comment->setIdReview($_POST["idReview"])
		->setIdUser($_POST["idUser"])
		->setContent($_POST["content"])
		->setStatus(1)
		->setDate("now")
		->save();