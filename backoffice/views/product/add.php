<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Ajouter un nouveau produit</h3>
      </div>
    </div>
    <form method="POST" action="/product/record/" onsubmit="return confirm('Avez-vous bien complété tous les champs?');">
      <div class="row-fluid" style="margin-top:0px;">
        <div class="span2"></div>
        <div class="span9"></div>
        <div class="span2">
          <p style="float:right;">Nom du product :</p>
        </div>
        <div class="span9">
          <input type="text" name="client" placeholder="Maillot de bain 'Stecy'" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Url de l'image :</p>
        </div>
        <div class="span9">
          <input type="text" name="url" placeholder="http://monsite.com/images/stecy_1.jpg" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Marque :</p>
        </div>
        <div class="span9">
          <input type="text" name="url" placeholder="Maillot Malin" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">EAN 13 :</p>
        </div>
        <div class="span9">
          <input type="text" name="url" placeholder="1234567891234" class="span5" />
        </div>
        <div class="span2">
          <p style="float:right;">Site Google :</p>
        </div>
        <div class="span9">
          <select name="google">
            <option value=".fr">.FR</option>
            <option value=".com">.COM</option>
            <option value=".de">.DE</option>
            <option value=".co.uk">.CO.UK</option>
            <option value=".es">.ES</option>
          </select>
        </div>
        <div class="span2" style="margin-top:5px;">
        </div>
        <div class="span9" style="margin-top:5px;">
          <input type="submit" class="btn btn-inverse" value="Lancer l'analyse" />
        </div>
      </div>
    </form>
  </div>
</div>

<?php add('footer'); ?>
