<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/composant/compatibilite/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/composant/compatibilite/store/">
    <fieldset>
      <legend><h2>Créer une compatibilité</h2></legend>
      <div class="form-group">
        <label for="composant1">Composant 1</label>
        <select multiple="" class="form-control" name="composant1" id="composant1">
          <?php foreach ($components as $key => $value): ?>
            <option value="<?= $value->id ?>"><?= $value->model ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="composant2">Composant 2</label>
        <select multiple="" class="form-control" name="composant2" id="composant2">
          <?php foreach ($components as $key => $value): ?>
            <option value="<?= $value->id ?>"><?= $value->model ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Creer une compatibilité</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
