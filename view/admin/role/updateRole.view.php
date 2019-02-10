<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/roles/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/roles/update/">
    <fieldset>
      <legend>Modification du role</legend>
      <input type="hidden" name="id" value="<?= $role->id ?>">
      <div class="form-group">
        <label for="name">Nom</label>
        <input name="name" type="text" class="form-control" id="name" value="<?= $role->nom ?>" />
      </div>
      <div class="text-right">
        <button type="submit" name="updateRole" class="btn btn-primary">Modifier</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
