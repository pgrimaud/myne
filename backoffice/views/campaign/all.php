<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Vos campagnes</h3>
      </div>
    </div>
    <div class="alert alert-myne">
      Vous pouvez ajouter une nouvelle campagne <a style="color:black;" href='/campaign/add/'>ici</a>.
    </div>
    <table class="table">
      <thead>
        <tr>
          <th class="textcenter span3">Nom</th>
          <th class="textcenter span3">Date</th>
          <th class="textcenter span3">Afficher</th>
          <th class="textcenter span3">Terminer</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="textcenter">Salons de jardin</td>
          <td class="textcenter">2014-06-20 20:23:56</td>
          <td class="textcenter">
            <a href="/campaign/show/1">
              <input type="button" class="btn btn-myne" value="Afficher"/>
            </a>
          </td>
          <td class="textcenter">
            <a href="#">
              <input type="button" class="btn btn-danger" value="Terminer"/>
            </a>
          </td>
        </tr>
      </tbody>
  </div>
</div>

<?php add('footer'); ?>
