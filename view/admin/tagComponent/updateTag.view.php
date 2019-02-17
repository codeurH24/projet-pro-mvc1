<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/composant/montrer-composant-<?= $tag->id_composant ?>.php" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post" action="/admin/tagComponent/update/">
        <fieldset>
          <legend>Modification du tag</legend>
          <div class="form-group">
            <label for="id">id</label>
            <input name="id" id="id" type="text" class="form-control" value="<?= $_GET['id'] ?>">
          </div>
          <div class="form-group">
            <label for="name">Nom</label>
            <input name="name" id="name" type="text" class="form-control" value="<?= $tag->tag ?>">
          </div>
          <div class="text-right">
            <button type="submit" name="updateUserTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
    <?php require 'view/admin/footerAdmin.php' ?>
