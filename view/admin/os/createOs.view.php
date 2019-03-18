<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/os/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/os/store/" enctype="multipart/form-data">
    <fieldset>
      <legend>Ajouter un Systeme d'exploitation</legend>
      <div class="form-group">
        <label for="name">Nom du systeme</label>
        <input name="name" type="text" class="form-control" id="name" value="<?= $_POST['name'] ?? '' ?>">
        <?= errorsForm('name') ?>
      </div>
      <div class="form-group">
        <label for="picture">Image</label>
        <input type="file" name="picture" id="picture" class="form-control-file" value="<?= $_POST['picture'] ?? '' ?>" />
        <?= errorsForm('picture') ?>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
