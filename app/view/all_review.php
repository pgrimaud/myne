<?php
    include 'header.php';
    include '../init.php';

    $user = UserQuery::create()
        // ->findOneByIdFacebook(1); // TOFIX
        ->findOneByIdUser(1);

	$oSelfReview = ReviewQuery::create()
					->filterByIdUser($user->getIdUser())
					->find();
	
	$oFriend = UserHasUserQuery::create()
					->filterByIdUser($user->getIdUser())
					->find()
					->toArray();
					
	echo "<pre>";
	print_r($oFriend);

	$oFriendReview = ReviewQuery::create()
						
?>
    <div class="container">
        <div>
        </div>
    </div>
    <div class="container">
        <h1>Liste de vos avis</h1>
        <?php
            $oReview = ReviewQuery::create()
                ->filterByIdUser($user->getIdUser())
                ->find();

            foreach ($oReview as $review):
                $product = $review->getProduct();
        ?>
        <div class="well">
            <h2><?php echo $product->getName(); ?><br><span><?php echo $product->getEanCode(); ?></span></h2>
            <h3><?php echo $review->getTitle(); ?><br><span><?php echo $review->getDate(); ?></span></h3>
            <p><?php echo nl2br($review->getContent()); ?></p>
            <div>
            <?php
                for($i = 0; $i <= $review->getRate(); $i++) {
                    echo "<span class=\"glyphicon glyphicon-star\"></span>";
                }
                for($j = $i; $j < 5; $j++) {
                    echo "<span class=\"glyphicon glyphicon-star-empty\"></span>";
                }
            ?>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
<?php
    include 'footer.php';
?>
