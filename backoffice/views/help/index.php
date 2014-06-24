<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Aide : Ajouter des produits grâce à un flux de données</h3>
      </div>
    </div>
    <p>Exemple de fichier XML valide</p>
    <pre><?php echo htmlentities('<products>
  <product>
    <name>Maillot de bain Stecy</name>
    <link_image>http://monsite.com/images/stecy_1.jpg</link_image>
    <brand>Maillot Malin</brand>
    <ean_code>1234567891234</ean_code>
    <id_categorie>1</id_categorie>
  </product>
  (...)
</products>'); ?></pre>
    <p id="exemple">Exemple de fichier CSV valide</p>
    <pre>"Maillot de bain Stecy","http://monsite.com/images/stecy_1.jpg","Maillot Malin","1234567891234","1"
"Maillot de bain Stecy 2","http://monsite.com/images/stecy_1.jpg","Maillot Malin","1234567891234","1"
"Maillot de bain Stecy 3","http://monsite.com/images/stecy_1.jpg","Maillot Malin","1234567891234","1"
(...)</pre>
    <p>Exemple de fichier TXT valide</p>
    <pre>"Maillot de bain Stecy"|"http://monsite.com/images/stecy_1.jpg"|"Maillot Malin"|"1234567891234"|"1"
"Maillot de bain Stecy 2"|"http://monsite.com/images/stecy_1.jpg"|"Maillot Malin"|"1234567891234"|"1"
"Maillot de bain Stecy 3"|"http://monsite.com/images/stecy_1.jpg"|"Maillot Malin"|"1234567891234"|"1"
(...)</pre>
  </div>
</div>

<?php add('footer'); ?>