<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/roles/delete/">
    <fieldset>
      <legend>Suppression</legend>
      <div class="form-group">
        <label for="nom">Souhaitez-vous réellement supprimer le role <?= $role->nom ?> du site web ?</label>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
      </div>
      <div class="text-right">
        <button type="submit" name="deleteRole" class="btn btn-danger ">Oui</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
