<?php
    include 'header.php';
    include '../init.php';
?>
<div class="container">
    <div class="row clearfix">
        <h1 class="text-center">Rédiger votre avis!</h1>
        <form role="form form-horizontal">
            <div class="form-group">
                 <label for="searchProduct" class="control-label">Sur quel produit souhaitez donner votre avis?</label><input type="text" class="form-control" id="searchProduct" placeholder="EAN, UTC, Nom du produit...">
            </div> <button type="submit" class="btn btn-primary" id="btn_searchProduct">Rechercher</button>
        </form>
        <div class="modal fade" id="addProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <hr>
        <form role="form">
            <div class="form-group">
                 <label for="reviewTitle">Donner un titre ou un commentaire court à votre avis :</label><input type="text" class="form-control" id="reviewTitle">
            </div>
            <div class="form-group">
                 <label for="reviewContent">Votre avis :</label><textarea rows="3" class="form-control" id="reviewContent"></textarea>
            </div>
            <div class="form-group">
                <label for="reviewRate">Notez ce produit :</label>
                <input type="number" name="reviewRate" id="reviewRate" class="rating" />
            </div> <button type="submit" class="btn btn-success">Valider !</button>
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
