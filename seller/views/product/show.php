<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span6">
        <h3 class="heading">Fiche produit</h3>
        <div class="row-fluid" style="margin-top:0px;">
          <div class="span12">
            <center>
              <img src="<?php echo $controller->getData()->product[0]['link_image']; ?>" style="max-height:200px;max-width:200px;"/>
              <p><b style="font-weight:bold;">Produit : </b><?php echo $controller->getData()->product[0]['name']; ?></p>
              <p><b style="font-weight:bold;">Marque : </b><?php echo $controller->getData()->product[0]['brand']; ?></p>
              <p><b style="font-weight:bold;">EAN 13 : </b><?php echo $controller->getData()->product[0]['ean_code']; ?></p>
              <p><b style="font-weight:bold;">Catégorie : </b><?php echo $controller->getData()->categories[$controller->getData()->product[0]['id_categorie']]; ?></p>
            </center>
          </div>
        </div>
      </div>
      <div class="span6">
        <h3 class="heading">Avis</h3>
        <div class="row-fluid" style="margin-top:0px;">
          <div class="span12">
            <?php if (sizeof($controller->getData()->reviews) > 0): ?>
              <?php foreach ($controller->getData()->reviews as $review): ?>
                <div class="span12" style="border-bottom:1px solid #dcdcdc;margin-left:5px;padding-bottom:10px;">
                  <!--<div style="float:left;width:15%;"><img src="https://graph.facebook.com/<?php echo $review['id_facebook']; ?>/picture" style="width:85px;"/></div>-->
                  <div style="float:right;width:100%;">
                    Le <?php echo $review['date']; ?><br/>
                    Note : <label class="badge badge-<?php echo $controller->getData()->color[(int) $review['rate']]; ?>"><?php echo $review['rate']; ?>/5</label><br/>
                    Titre : <?php echo $review['title']; ?><br/>
                    <p>Contenu : <?php echo $review['content']; ?></p>
                  </div>
                </div>
                <div class="span12" style="border-bottom:1px solid #dcdcdc;margin-top:10px;padding-bottom:7px;">
                  <div style="float:left;"><b style="font-weight:bold;"><?php echo sizeof($controller->getData()->comments[$review['id_review']]); ?> commentaires :</b></div>
                  <?php if (sizeof($controller->getData()->comments[$review['id_review']]) > 0): ?>
                    <?php foreach ($controller->getData()->comments[$review['id_review']] as $comment): ?>

                      <div style="float:right;width:75%;padding-top:5px;border-bottom:1px solid #dcdcdc;">
                        Le <?php echo $comment['date']; ?><br/>
                        <p>Contenu : <?php echo $comment['content']; ?></p>
                      </div>
                      <!--<div style="float:right;margin-right:15px;margin-top:7px;">
                        <img src="https://graph.facebook.com/<?php echo $comment['id_facebook']; ?>/picture" style="width:35px;"/>
                      </div>-->
                    <?php endforeach; ?>
                  <?php else: ?>
                    <span class="badge badge-info" style="margin-left:30px;">Pas de commentaires.</span>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="alert alert-warning">
                Vous n'avez pas encore d'avis pour ce produit.
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">
          Intégrer ces avis à votre site internet
        </h3>
        <div class="row-fluid">
          <div class="span6">
            <p class="heading">Via une IFrame</p>
            <pre>
              <?php echo htmlentities('<iframe src="http://myne.iframe/product/' . $controller->getData()->product[0]['id_product'] . '"></iframe>'); ?>
            </pre>
          </div>
          <div class="span6">
            <p class="heading">Via notre API</p>
            <center><a href="/help">Voir l'aide API</a></center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php add('footer'); ?>
