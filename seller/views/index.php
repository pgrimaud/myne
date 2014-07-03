<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Tableau de bord</h3>
        <div class="alert alert-warning">
          Rechercher un produit : <input type="text" class="span4" value="" id="field" placeholder="Nom, EAN, Marque, ..." style="margin-top:10px;" /> <input type="button" value="Rechercher" class="btn btn-inverse" onclick="search($('#field').val())"/>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Vos Produits</h3>
        <?php if (sizeof($controller->getData()->products) > 0): ?>
          <table class="table">
            <thead>
              <tr>
                <th class="textcenter span1">ID</th>
                <th class="textcenter span3">Nom</th>
                <th class="textcenter span3">Marque</th>
                <th class="textcenter span2">Image</th>
                <th class="textcenter span4">Catégorie</th>
                <th class="textcenter span2">EAN</th>
                <th class="textcenter span1">Editer</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($controller->getData()->products as $product): ?>
                <tr>
                  <td class="textcenter"><?php echo $product['id_product']; ?></td>
                  <td class="textcenter"><a href="/product/detail/<?php echo $product['id_product']; ?>"><?php echo $product['name']; ?></a></td>
                  <td class="textcenter"><?php echo $product['brand']; ?></td>
                  <td class="textcenter">
                    <a href="<?php echo $product['link_image']; ?>" target="blank">
                      <img src="<?php echo $product['link_image']; ?>" style="max-height:30px;max-width:30px;"/>
                    </a>
                  </td>
                  <td class="textcenter"><?php echo $product['name_categorie']; ?></td>
                  <td class="textcenter"><?php echo $product['ean_code']; ?></td>
                  <td class="textcenter">
                    <a href="/product/edit/<?php echo $product['id_product']; ?>">
                      <input type="button" class="btn btn-myne" value="Editer"/>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-warning">
            Vous n'avez pas encore de produit.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<script>
</script>
<?php add('footer'); ?>