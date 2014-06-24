<?php
    include 'header.php';
    include '../init.php';

    $user = UserQuery::create()
                ->findOneByIdUser(1); // TOFIX
?>
<div class="container">
    <div class="row clearfix">
        <h1 class="text-center">Rédiger votre avis!</h1>
        <form role="form form-horizontal" id="formSearchProduct">
            <div class="form-group">
                 <label for="searchProduct" class="control-label">Sur quel produit souhaitez donner votre avis?</label><input type="text" class="form-control" id="searchProduct" placeholder="code EAN ou le nom du produit">
            </div> <button type="submit" class="btn btn-primary" id="btn_searchProduct">Rechercher</button>
        </form>
        <div id="infoProduct" style="display:none;">
            <h2></h2>
            <p></p>
            <button type="button" class="btn btn-primary" id="btn_searchAnotherProduct">Changer de Produit</button>
        </div>
        <div class="modal fade" id="addProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">C'est fâcheux, mais ce produit n'a pas été trouvé... Ajoutez le! :^)</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="modalProductForm">
                            <div class="form-group">
                                 <label for="productName">Nom du produit</label><input type="text" class="form-control" id="productName">
                            </div>
                            <div class="form-group">
                                 <label for="productEan">Code Ean</label><input type="text" class="form-control" id="productEan">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Plus tard...</button>
                        <button type="button" class="btn btn-primary" id="btnAddProduct">Ajouter !</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <hr>
        <form role="form" name="addReview" id="formAddReview">
            <div class="form-group">
                 <label for="reviewTitle">Donner un titre ou un commentaire court à votre avis :</label><input type="text" class="form-control" id="reviewTitle">
            </div>
            <div class="form-group">
                 <label for="reviewContent">Votre avis :</label><textarea rows="3" class="form-control" id="reviewContent"></textarea>
            </div>
            <div class="form-group">
                <label for="reviewRate">Notez ce produit :</label>
                <input type="number" name="reviewRate" id="reviewRate" class="rating" />
            </div>
            <?php
                if($user->getPublication() == 0) :
            ?>
            <div class="form-group">
                <input type="hidden" name="userPublication" value="<?php echo $user->getPublication(); ?>" />
                <p>Veuillez définir la visibilité de votre avis :</p>
                <label class="radio-inline">
                    <input type="radio" id="publication1" name="radioPublication" value="1"> Je veux être le seul à pouvoir le voir!
                </label>
                <label class="radio-inline">
                    <input type="radio" id="publication2" name="radioPublication" value="2"> Je veux que seul mes amis Facebook y aient accès!
                </label>
                <label class="radio-inline">
                    <input type="radio" id="publication3" name="radioPublication" value="3"> Cet avis est visible pour tout le monde! :^)
                </label>
            </div>
            <?php else: ?>
                <input type="hidden" name="userPublication" value="<?php echo $user->getPublication(); ?>" />
            <?php endif; ?>
            <button type="submit" class="btn btn-success disabled">Valider !</button>
        </form>
    </div>
    <hr>
    <div class="row clearfix">
    <?php
        $oReview = ReviewQuery::create()
            ->filterByIdUser(1)
            ->orderByDate("ASC")
            ->setLimit(3)
            ->find();

        if(!$oReview->isEmpty()) :
            $nbReview = $oReview->count();
    ?>
        <div class="col-md-12 column">
            <h3 class="text-center">- Mes 3 derniers avis -</h3>
            <div class="row">
            <?php foreach ($oReview as $review) : ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/technics">
                        <div class="caption">
                            <h3><?php echo $review->getTitle(); ?></h3>
                            <p><?php echo $review->getContent(); ?></p>
                            <p>
                                <a class="btn btn-primary" href="#">Voir l'avis</a>
                                <a class="btn btn-primary" href="#">Partage</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <h3 class="text-center">Vous n'avez pas encore redigé d'avis. Quel a été votre dernier achat? Vous avez sûrement un avis a donner! ;^)</h3>
    <?php endif; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
