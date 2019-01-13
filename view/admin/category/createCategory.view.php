<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/categorie/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/categorie/store/">
    <fieldset>
      <legend>Creer une catégorie</legend>
      <div class="form-group">
        <label for="adminNameCreateCategory">Nom de la catégorie</label>
        <input name="name" type="text" class="form-control" id="adminNameCreateCategory">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
