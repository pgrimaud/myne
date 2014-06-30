<?php
    include 'header.php';
    include '../init.php';

    $user = UserQuery::create()
        // ->findOneByIdFacebook(1); // TOFIX
        ->findOneByIdUser(1);

	$oSelfReview = ReviewQuery::create()
					->filterByIdUser($user->getIdUser())
					->find();
	
	$aFriend = UserHasUserQuery::create()
					->filterByIdUser($user->getIdUser())
					->find()
					->toArray();

	if(!empty($aFriend)) {
		$tmp = array();
		foreach ($aFriend as $friends) {
			array_push($tmp, $friends["IdFacebookFriend"]);
		}
	}

	$oFriendReview = ReviewQuery::create()
						->joinUser()
						->where("User.IdFacebook IN ?", $tmp)
						->find();
									
?>
    <div class="container">
        <div>
        </div>
    </div>
    <div class="container">
        <!--h1>// ajout avis</h1-->
        <?php
            $oReview = ReviewQuery::create()
                ->filterByIdUser($user->getIdUser())
                ->find();

			$related = 1;
            foreach ($oReview as $review):
                $product = $review->getProduct();
				$user = $review->getUser();
        ?>
		<div class="row frame">
				<div class="col-md-4">
					<img class="img-product" src="<?php echo $product->getLinkImage(); ?>">
				</div>
				<div class="col-md-8">
					<h2 class="product-title" title="EAN : <?php echo $product->getEanCode(); ?>"><?php echo utf8_decode($product->getName()); ?></h2>
					<hr>
					<h3>Avis rédigé par <?php echo $user->getFirstName(); ?></h3>
					<h4><?php echo $review->getTitle(); ?><br><span><?php echo $review->getDate(); ?></span></h4>
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
		</div>
		<?php 
			if($related == 4): 
			$oReviewRelated = ReviewQuery::create()
								->setLimit(3)
								->find();
		?>
		<div class="row">
			<h4 class="h4-related">A voir également...</h4>
		<?php
			foreach($oReviewRelated as $reviewRelated):
				$productRelated = $reviewRelated->getProduct();
		?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img class="img-180" src="<?php echo $productRelated->getLinkImage(); ?>">
					<div class="caption">
						<h3><?php echo utf8_decode($productRelated->getName()); ?></h3>
						<p><a href="#" class="btn btn-primary" role="button">Voir l'avis</a></p>
						<div>
						<?php
							for($a = 0; $a <= $reviewRelated->getRate(); $a++) {
								echo "<span class=\"glyphicon glyphicon-star\"></span>";
							}
							for($c = $a; $c < 5; $c++) {
								echo "<span class=\"glyphicon glyphicon-star-empty\"></span>";
							}
						?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<?php
			$related = 1;
			else:
		?>
        <hr>
		<?php endif; ?>
        <?php
			$related++;
			endforeach; 
		?>
    </div>
<?php
    include 'footer.php';
?>
