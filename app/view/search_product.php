<?php
	if(!isset($_GET["input"]) || $_GET["input"] == "") {
		header('location: all_review.php');
	}

    include 'header.php';
    include '../init.php';

	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

	$oProduct = ProductQuery::create()
		->filterByName('%'.$_GET["input"].'%');
		
	$oProduct = $oProduct->paginate($page, 30);
?>
<div class="container" id="container">
	<?php
		$i = 1;
		foreach ($oProduct as $product) {
			if($i == 1) {
				echo "<div class=\"row\">";
			}

			echo "<div class=\"product-search-div col-md-3\">";
			echo "<span>".utf8_decode($product->getName())."</span>";
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
	<ul class="pagination">
        <?php
			$input = "&input=".$_GET["input"];

            $link = $oProduct->getLinks(5);
            if (!$oProduct->isFirstPage()) {
                echo "<li><a href='search_product.php?page=".$oProduct->getPreviousPage().$input."'>Page Précédente</a></li>";
            }

            foreach ($link as $page)
            {
                if ($page == $oProduct->getPage())
                    echo "<li class='active'><a href='search_product.php?page=".$page.$input."'>{$page}</a></li>";
                else
                    echo "<li><a href='search_product.php?page=".$page.$input."'>{$page}</a></li>";
            }

            if (!$oProduct->isLastPage()) {
                echo "<li><a href='search_product.php?page=".$oProduct->getNextPage().$input."'>Page Suivante</a></li>";
            }
        ?>
        </ul>
</div>
<?php
    include 'footer.php';