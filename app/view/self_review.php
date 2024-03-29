<?php
    include 'header.php';
    include '../init.php';

    $user = UserQuery::create()
        // ->findOneByIdFacebook(1); // TOFIX
        ->findOneByIdUser(1);

    if(isset($_GET["id_review"]) && $_GET["id_review"]): // only one specific user's review
        $idReview = $_GET["id_review"];

        $review = ReviewQuery::create()
            ->findOneByIdReview($idReview);

        if($review->getIdUser() != $user->getIdUser()) {
            header("location: index.php");
            exit;
        }
?>
    <div class="container">
        <div>
        </div>
    </div>
<?php else: // all user's reviews ?>
    <div class="container">
        <h1>Liste de vos avis</h1>
        <?php
            $oReview = ReviewQuery::create()
                ->filterByIdUser($user->getIdUser())
                ->find();

            foreach ($oReview as $review):
                $product = $review->getProduct();
        ?>
        <div class="well row">
			<div class="col-md-4">
				<img class="img-product" src="<?php echo $product->getLinkImage(); ?>">
			</div>
			<div class="col-md-8">
				<h2><?php echo utf8_decode($product->getName()); ?><br><span><?php echo $product->getEanCode(); ?></span></h2>
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
				<div>
				<?php
					$nbComments = CommentQuery::create()
									->filterByIdReview($review->getIdReview())
									->count();
									
					if($nbComments > 0)
						echo "<a href=\"review.php?id=".$review->getIdReview()."\">Aucun commentaire</a>";
					elseif($nbComments == 1)
						echo "<a href=\"review.php?id=".$review->getIdReview()."\">{$nbComments} commentaire!</a>";
					else
						echo "<a href=\"review.php?id=".$review->getIdReview()."\">{$nbComments} commentaires!</a>";
				?>
				</div>
			</div>
		</div>
        <hr>
        <?php endforeach; ?>
    </div>
<?php
    endif;
    include 'footer.php';
?>
