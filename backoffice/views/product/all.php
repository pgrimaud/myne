<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Vos produits</h3>
      </div>
    </div>
    <div class="alert alert-warning">
      Vous pouvez ajouter un nouveau produit <a href='/product/add/'>ici</a>.
    </div>
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
                  <input type="button" class="btn btn-warning" value="Editer"/>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="alert alert-warning">
        Vous n'avez pas encore de produit mais vous pouvez en ajouter <a href='/product/add/'>ici</a>.
      </div>
    <?php endif; ?>

  </div>
</div>

<?php add('footer'); ?>
