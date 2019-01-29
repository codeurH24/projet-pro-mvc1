<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/acces/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/acces/delete/">
    <fieldset>
      <legend>Suppression</legend>
      <div class="form-group">
        <label for="nom">Souhaitez-vous réellement supprimer l'accès <?= $access->url ?> pour les <?= getRoleByID($access->role_id)->nom ?> ?</label>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
      </div>
      <div class="text-right">
        <button type="submit" name="deleteAccess" class="btn btn-danger">Oui</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
