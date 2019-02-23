<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/revendeur/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/revendeur/update/">
    <fieldset>
      <legend>Modification d'un revendeur</legend>
      <div class="form-group d-none">
        <label for="idRetailerUpdate">ID</label>
        <input name="id" type="text" class="form-control" id="idRetailerUpdate" value="<?= $reseller->id ?>" />
      </div>
      <div class="form-group">
        <label for="nameRetailerUpdate">Nom</label>
        <input name="name" type="text" class="form-control" id="nameRetailerUpdate" value="<?= $reseller->name ?>" />
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
