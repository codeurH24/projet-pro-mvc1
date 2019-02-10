<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/revendeur/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/revendeur/store/">
    <fieldset>
      <legend>Creer un revendeur</legend>
      <div class="form-group">
        <label for="adminNameCreateRetailer">Nom du revendeur</label>
        <input name="name" type="text" class="form-control" id="adminNameCreateRetailer">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
