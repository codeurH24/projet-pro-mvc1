<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/composant/lien-du-revendeur/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/composant/lien-du-revendeur/update/">
    <h2>Modifier Le lien</h2>
    <h6><?= $resellerLink->nom ?> - <?= $resellerLink->model ?></h6>
    <div class="form-group d-none">
      <label>ID</label>
      <input type="type" value="<?= $resellerLink->id ?>" name="id" class="form-control">
    </div>
    <div class="form-group">
      <label for="revendeurUpdateRevendeurLnkComposant">Revendeur</label>
      <select multiple="" class="form-control" name="revendeur" id="revendeurUpdateRevendeurLnkComposant">
        <?php foreach ($resellers as $value): ?>
          <?php if ($resellerLink->id_revendeur == $value->id ){ ?>
            <option value="<?= $value->id ?>" selected=""><?= $value->nom ?></option>
          <?php }else{ ?>
            <option value="<?= $value->id ?>"><?= $value->nom ?></option>
          <?php } ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="composantUpdateRevendeurLnkComposant">Composant</label>
      <select multiple="" class="form-control" name="composant" id="composantUpdateRevendeurLnkComposant">
        <?php foreach ($components as $key => $value): ?>
          <?php if ($resellerLink->id_composant == $value->id ): ?>
            <option value="<?= $value->id  ?>" selected><?= $value->model ?></option>
          <?php else: ?>
            <option value="<?= $value->id  ?>"><?= $value->model ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="lienUpdateRevendeurLnkComposant">Lien</label>
      <input type="type" value="<?= $resellerLink->lien ?>" class="form-control" name="lien" id="lienUpdateRevendeurLnkComposant">
    </div>
    <div class="form-group">
      <label for="prixUpdateRevendeurLnkComposant">Prix</label>
      <input type="type" value="<?= $resellerLink->prix ?>" class="form-control" name="prix" id="prixUpdateRevendeurLnkComposant">
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
