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
    <div class="row-fluid" style="margin-top:0px;">
      <div id="results">

      </div>
    </div>
    <div class="row-fluid" style="margin-top:0px;">
      <div class="span12">
        <h3 class="heading">Vos Produits</h3>
        <div id="products">
          <?php if (sizeof($controller->getData()->products) > 0): ?>
            <table class="table">
              <thead>
                <tr>
                  <th class="textcenter span1">ID</th>
                  <th class="textcenter span3">Nom</th>
                  <th class="textcenter span3">Marque</th>
                  <th class="textcenter span2">Image</th>
                  <th class="textcenter span2">EAN</th>
                  <th class="textcenter span1">Editer</th>
                  <th class="textcenter span1">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($controller->getData()->products as $product): ?>
                  <tr id="productshow-<?php echo $product['id_product']; ?>">
                    <td class="textcenter"><?php echo $product['id_product']; ?></td>
                    <td class="textcenter"><?php echo $product['name']; ?></td>
                    <td class="textcenter"><?php echo $product['brand']; ?></td>
                    <td class="textcenter">
                      <a href="<?php echo $product['link_image']; ?>" target="blank">
                        <img src="<?php echo $product['link_image']; ?>" style="max-height:30px;max-width:30px;"/>
                      </a>
                    </td>
                    <td class="textcenter"><?php echo $product['ean_code']; ?></td>
                    <td class="textcenter">
                      <a href="/product/show/<?php echo $product['id_product']; ?>">
                        <input type="button" class="btn btn-myne" value="Voir"/>
                      </a>
                    </td>
                    <td class="textcenter">
                      <input type="button" onclick="deleteproduct(<?php echo $product['id_product']; ?>)" class="btn btn-danger" value="Supprimer"/>
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
</div>
<script>
  function search(value) {
    $.post('/index/searchproduct', {value: value},
    function(data) {
      $('#results').html(data);
    }, "text");
    return false;
  }
  function loadProducts() {
    $.post('/index/loadproduct',
            function(data) {
              $('#products').html(data);
            }, "text");
    return false;
  }
  function deleteproduct(id) {
    $.post('/product/delete', {id: id},
            function(data) {
              $('#productshow-' + id).hide();
            }, "text");
    return false;
  }
</script>
<?php add('footer'); ?>