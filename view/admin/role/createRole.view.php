<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/roles/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/roles/store/">
    <fieldset>
      <legend>Creer un role</legend>
      <div class="form-group">
        <label for="name">Nom du role</label>
        <input name="name" type="text" class="form-control" id="name">
      </div>
      <div class="text-right">
        <button type="submit" name="createRole" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
