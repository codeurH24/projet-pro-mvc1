<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="row">
    <div class="col-12 mt-3">
      <div class="text-right">
        <a href="/admin/composant/montrer-composant-<?= $_GET['id'] ?>.php" class="btn btn-secondary">Retour</a>
      </div>
    </div>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8">
  <form method="post" enctype="multipart/form-data" action="/admin/tagComponent/store/">
    <fieldset>
      <legend>
        <h2>Creer un Tag pour le composant</h2>
      </legend>
      <div class="form-group">
        <label for="id">ID composant</label>
        <input type="text" name="id" id="id" class="form-control" value="<?= $_GET['id'] ?>" />
      </div>
      <div class="form-group">
        <label for="name">Nom du tag</label>
        <input type="text" name="name" id="name" class="form-control" />
      </div>
      <div class="text-right">
        <button type="submit" name="createTagComponent" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
