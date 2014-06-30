<?php
    include 'header.php';
    include '../init.php';
	
	$aBrand = array(
		"Sennheiser",
		"Neutrik",
		"DJ Tech"
	);
	$oProduct = ProductQuery::create()
		->where("Product.Brand IN ?", $aBrand)
		->setLimit(24)
		->find();
?>
<div class="container" id="container">
	<!--div class="row"-->
	<?php
		$i = 1;
		foreach ($oProduct as $product) {
			if($i == 1) {
				echo "<div class=\"row\">";
			}

			echo "<div class=\"product-search-div col-md-3\">";
			echo "<span>{$product->getName()}</span>";
			echo "<img class=\"img-search\" src=\"{$product->getLinkImage()}\"/>";
			echo "<a href=\"\">Voir le produit</a>";
			echo "</div>";
			
			if(($i % 6) == 0) {
				echo "</div>";
				$i = 0;
			}
			$i++;
		}
	?>
</div>
<?php
    include 'footer.php';