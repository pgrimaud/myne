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