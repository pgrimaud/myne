<?php
	if(!isset($_GET["id"]) || $_GET["id"] == "") {
		header('location: all_review.php');
		exit;
	}

    include 'header.php';
    include '../init.php';

	$review = ReviewQuery::create()
				->findOneByIdReview($_GET["id"]);
				//->filterByIdReview($_GET["id"])
				//->find();
				
	//print_r($oReview);
?>
	<div class="container">
	<?php $product = $review->getProduct(); ?>
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
			</div>
		</div>
		<div class="comments">
		<?php
			$oComment = CommentQuery::create()
							->filterByIdReview($_GET["id"])
							->find();
			
			if(!$oComment->isEmpty()):			
				foreach ($oComment as $comment):
					$user = $comment->getUser();
		?>
			<div class="single-comment">
				<h4>Par <?php echo $user->getFirstName(); ?> le <?php echo $comment->getDate("d/m/Y"); ?></h4>
				<p><?php echo $comment->getContent(); ?></p>
			</div>
			<?php
				endforeach;
				else: 
			?>
				<p>Aucun commentaire pour cet avis.</p>
			<?php endif; ?>
			<hr>
			<div class="add-comment">
				<form method="POST" action="#">
					<div class="form-group">
						<label for="addComment">Ajouter un commentaire</label>
						<textarea class="form-control" id="addComment" placeholder="Ajouter un commentaire" row="1"></textarea>
					</div>
					<input type="hidden" name="idReview" value="<?php echo $_GET["id"]; ?>">
					<input type="hidden" name="idUser" value="<?php echo CURRENT_USER; ?>">
					<button type="submit" class="btn btn-primary btn-add-comment">Commenter!</button>
				</form>
			</div>
		</div>
	</div>
<?php
    include 'footer.php';
?>
