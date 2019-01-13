<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/categorie/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/categorie/update/">
    <fieldset>
      <legend>Modification d'une catégorie</legend>
      <div class="form-group d-none">
        <label for="idCategoryUpdate">id</label>
        <input name="id" type="text" class="form-control" id="idCategoryUpdate" value="<?= $category->id ?>">
      </div>
      <div class="form-group">
        <label for="nomCategoryUpdate">Nom</label>
        <input name="name" type="text" class="form-control" id="nomCategoryUpdate" value="<?= $category->nom ?>">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
