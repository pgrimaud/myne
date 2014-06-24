<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Tableau de bord</h3>
      </div>
    </div>
    <div class="row-fluid" style="margin-top:0px;">
      <div class="span3">
        <div class="alert alert-success textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          <?php echo $controller->getData()->kpi['sum_products']; ?> Produits
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-warning textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          <?php echo $controller->getData()->kpi['sum_reviews']; ?> Avis
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-danger textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          <?php echo $controller->getData()->kpi['sum_comments']; ?> Commentaires
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-info textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          Note moyenne : <?php echo $controller->getData()->kpi['average_rate']; ?>/5
        </div>
      </div>
    </div>

    <div class="row-fluid" style="margin-top:0px;">
      <div class="span12">
        <h3 class="heading">Evolution des 30 derniers jours</h3>
      </div>
    </div>
    
    <div class="row-fluid" style="margin-top:0px;">
      <div class="span6">
        <h3 class="heading">Produits populaires</h3>
        <?php if (sizeof($controller->getData()->top_products) > 0): ?>
          <?php foreach ($controller->getData()->top_products as $review): ?>
            <div class="span12" style="border-bottom:1px solid #dcdcdc;margin-top:10px;margin-left:5px;">
              <img src="<?php echo $review['link_image']; ?>" style="max-height:100px;max-width:100px;float:left;margin-right:5px;" />
              <div style="float:left;width:85%;">
                Produit : <label class="badge badge-inverse"><?php echo $review['name']; ?></label><br/>
                Catégorie : <?php echo $review['name_categorie']; ?><br/>
                Note moyenne : <label class="badge badge-<?php echo $controller->getData()->color[(int) $review['rate']]; ?>"><?php echo (float) round($review['rate'], 2); ?>/5</label><br/>
                <p>Nombre d'avis : <?php echo $review['nb_review']; ?></p>
                <a href="/review/show/<?php echo $review['id_product']; ?>"><label class="badge badge-success" style="float:right;margin-top:20px;margin-right:20px;">Voir les avis de ce produit</label></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="alert alert-inverse">
            Vous n'avez pas encore d'avis. :(
          </div>
        <?php endif; ?>
      </div>
      <div class="span6">
        <h3 class="heading">Derniers Avis</h3>
        <?php if (sizeof($controller->getData()->last_reviews) > 0): ?>
          <?php foreach ($controller->getData()->last_reviews as $review): ?>
            <div class="span12" style="border-bottom:1px solid #dcdcdc;margin-top:10px;margin-left:5px;">
              <img src="<?php echo $review['link_image']; ?>" style="max-height:100px;max-width:100px;float:left;margin-right:5px;" />
              <div style="float:left;width:85%;">
                Avis du produit : <label class="badge badge-inverse"><?php echo $review['name']; ?></label><br/>
                Par : <?php echo $review['first_name']; ?> <?php echo $review['last_name']; ?>
                le <?php echo $review['date']; ?><br/>
                Note : <label class="badge badge-<?php echo $controller->getData()->color[(int) $review['rate']]; ?>"><?php echo $review['rate']; ?>/5</label><br/>
                Titre : <?php echo $review['title']; ?><br/>
                <p>Contenu : <?php echo $review['content']; ?></p>
                <a href="/review/show/<?php echo $review['id_product']; ?>"><label class="badge badge-success" style="float:right;margin-right:20px;">Voir les avis de ce produit</label></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="alert alert-inverse">
            Vous n'avez pas encore d'avis. :(
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php add('footer'); ?>