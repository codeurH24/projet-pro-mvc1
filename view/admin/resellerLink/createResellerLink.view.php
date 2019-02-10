<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/composant/lien-du-revendeur/" class="btn btn-secondary">Retour</a>
  </div>

  <form method="post" action="/admin/composant/lien-du-revendeur/store/">
    <div class="form-group">
      <label for="revendeurCreateRevendeurLnkComposant">Revendeur</label>
      <select multiple="" class="form-control" name="revendeur" id="revendeurCreateRevendeurLnkComposant">
        <?php foreach ($resellers as $value): ?>
            <option value="<?= $value->id ?>"><?= $value->nom ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="composantCreateRevendeurLnkComposant">Composant</label>
      <select multiple="" class="form-control" name="composant" id="composantCreateRevendeurLnkComposant">
        <?php foreach ($components as $key => $value): ?>
            <option value="<?= $value->id  ?>"><?= $value->model ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="lienCreateRevendeurLnkComposant">Lien</label>
      <input type="type" class="form-control" name="lien" id="lienCreateRevendeurLnkComposant">
    </div>
    <div class="form-group">
      <label for="prixCreateRevendeurLnkComposant">Prix</label>
      <input type="type" class="form-control" name="prix" id="prixCreateRevendeurLnkComposant">
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Creer</button>
    </div>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
