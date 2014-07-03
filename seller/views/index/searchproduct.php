<?php if (sizeof($controller->getData()->results) > 0): ?>
  <table class="table">
    <thead>
      <tr>
        <th class="textcenter span1">ID</th>
        <th class="textcenter span3">Nom</th>
        <th class="textcenter span3">Marque</th>
        <th class="textcenter span2">Image</th>
        <th class="textcenter span2">EAN</th>
        <th class="textcenter span1">Ajouter</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($controller->getData()->results as $product): ?>
        <tr>
          <td class="textcenter"><?php echo $product['id_product']; ?></td>
          <td class="textcenter"><?php echo utf8_decode($product['name']); ?></td>
          <td class="textcenter"><?php echo $product['brand']; ?></td>
          <td class="textcenter">
            <a href="<?php echo $product['link_image']; ?>" target="blank">
              <img src="<?php echo $product['link_image']; ?>" style="max-height:30px;max-width:30px;"/>
            </a>
          </td>
          <td class="textcenter"><?php echo $product['ean_code']; ?></td>
          <td class="textcenter">
            <input id="product-<?php echo $product['id_product']; ?>" type="button" class="btn btn-myne" value="Ajouter" onclick="add('<?php echo $product['id_product']; ?>')"/>
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
<script>
  function add(value) {
    $('#product-'+value).attr('disabled', 'disabled');
    $.post('/product/add', {value: value},
    function(data) {
      loadProducts()
    }, "text");
    return false;
  }
</script>