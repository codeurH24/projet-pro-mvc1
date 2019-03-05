<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/os/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/os/update/" enctype="multipart/form-data">
    <fieldset>
      <legend>Modifier un Systeme d'exploitation</legend>
      <div class="form-group d-none">
        <label for="id">ID du systeme</label>
        <input name="id" type="text" class="form-control" id="id" value="<?= $_GET['id'] ?>" />
      </div>
      <div class="form-group">
        <label for="name">Nom du systeme</label>
        <input name="name" type="text" class="form-control" id="name" value="<?= $_POST['name'] ?? $os->name ?>" />
      </div>
      <div class="form-group text-center">
        <label for="picture">
          <img src="/public/picture/OS/<?= $os->picture ?>" alt="image du systeme" width="128" />
        </label>
        <div>
          <input type="file" name="picture" id="picture" value="<?= $_POST['picture'] ?? $os->picture ?>" />
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
