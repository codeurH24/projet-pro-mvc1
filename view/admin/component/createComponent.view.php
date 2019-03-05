<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/composant/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" enctype="multipart/form-data" action="/admin/composant/store/">
    <fieldset>
      <legend><h2>Creer un composant</h2></legend>
      <div class="form-group">
        <label for="modelComposantCreate">Model</label>
        <input type="text" name="model" id="modelComposantCreate" class="form-control" aria-describedby="emailHelp" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="marqueComposantCreate">Marque</label>
        <input type="text" name="marque" id="marqueComposantCreate" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="scoreComposantCreate">Score Passmark</label>
        <input type="number" name="score" id="scoreComposantCreate" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="categorieComposantCreate">Categorie</label>
        <select multiple="" name="categorie" class="form-control" id="categorieComposantCreate">
          <?php foreach ($categories as $value): ?>
              <option value="<?= $value->id ?>"><?= $value->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="pictureComponentCreate">Image</label>
        <input type="file" name="pictureComponentCreate" id="pictureComponentCreate" class="form-control-file" />
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Enregister</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
