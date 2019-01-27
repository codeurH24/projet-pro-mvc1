<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/acces/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/acces/update/">
    <fieldset>
      <legend>Modification de l'accès</legend>
      <div class="form-group d-none">
        <label for="id">ID</label>
        <input name="id" type="text" class="form-control" id="id" value="<?= $access->id ?>">
      </div>
      <div class="form-group">
        <label for="id_role">ID Role</label>
        <select name="id_role" class="form-control" id="id_role">
            <?php foreach ($roles as $role): ?>
              <option value="<?= $role->id ?>"><?= $role->nom ?></option>
            <?php endforeach; ?>
          </select>
        </select>
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input name="url" type="text" class="form-control" id="url" value="<?= $access->url ?>">
        </div>
        <div class="form-group">
          <label for="pass_right">Droit d'accès</label>
          <input name="pass_right" type="text" class="form-control" id="pass_right" value="<?= $access->pass_right ?>">
        </div>
        <div class="text-right">
          <button type="submit" name="updateAccessTable" class="btn btn-primary">Modifier</button>
        </div>
      </fieldset>
    </form>
  </div>
  <?php require 'view/admin/footerAdmin.php' ?>
