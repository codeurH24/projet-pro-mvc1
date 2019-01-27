<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/acces/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/acces/store/">
    <fieldset>
      <legend>Creer un accès</legend>
      <div class="form-group">
        <label for="id_role">Role</label>
        <select name="id_role" type="text" class="form-control" id="id_role">
          <?php foreach ($roles as $role): ?>
            <option value="<?= $role->id ?>"><?= $role->nom ?></option>
          <?php endforeach; ?>
        </select>
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input name="url" type="text" class="form-control" id="url">
        </div>
        <div class="text-right">
          <button type="submit" name="createAccessTable" class="btn btn-primary">Creer</button>
        </div>
      </fieldset>
    </form>
  </div>
  <?php require 'view/admin/footerAdmin.php' ?>
