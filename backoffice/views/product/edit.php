<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Edition du produit #<?php echo $controller->getData()->product[0]['id_product']; ?></h3>
      </div>
    </div>
    <form method="POST" action="/product/update/" onsubmit="return confirm('Avez-vous bien complété tous les champs?');">
      <div class="row-fluid" style="margin-top:0px;">
        <div class="span2"></div>
        <div class="span9"></div>
        <div class="span2">
          <p style="float:right;">Nom du product :</p>
        </div>
        <div class="span9">
          <input type="hidden" name="id_product" value="<?php echo $controller->getData()->product[0]['id_product']; ?>" />
          <input type="text" name="name" placeholder="Maillot de bain 'Stecy'" value="<?php echo $controller->getData()->product[0]['name']; ?>" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Url de l'image :</p>
        </div>
        <div class="span9">
          <input type="text" name="url" value="<?php echo $controller->getData()->product[0]['link_image']; ?>" placeholder="http://monsite.com/images/stecy_1.jpg" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Marque :</p>
        </div>
        <div class="span9">
          <input type="text" name="brand" value="<?php echo $controller->getData()->product[0]['brand']; ?>" placeholder="Maillot Malin" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">EAN 13 :</p>
        </div>
        <div class="span9">
          <input type="text" name="ean" value="<?php echo $controller->getData()->product[0]['ean_code']; ?>" placeholder="1234567891234" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Catégorie :</p>
        </div>
        <div class="span9">
          <select name="categorie" class="span5">
            <option></option>
            <?php foreach ($controller->getData()->categories as $id => $name): ?>
              <option <?php if ($controller->getData()->product[0]['id_categorie'] == $id) echo 'selected="selected"'; ?> value="<?php echo $id; ?>"><?php echo $name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="span2" style="margin-top:5px;">
        </div>
        <div class="span9" style="margin-top:5px;">
          <input type="submit" class="btn btn-inverse" value="Modifier le produit" />
          <input type="button" class="btn btn-danger" value="Supprimer le produit" onclick="delete_product('<?php echo $controller->getData()->product[0]['id_product']; ?>')"/>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function delete_product(id) {
    if (confirm('Voulez vous supprimer ce produit?')) {
      window.location.href = '/product/delete/' + id;
    }
  }
</script>
<?php add('footer'); ?>
