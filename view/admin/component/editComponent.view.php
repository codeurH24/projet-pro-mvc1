<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-11 col-xl-8">
  <div class="text-right mb-3">
    <a href="/admin/composant/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" enctype="multipart/form-data" action="/admin/composant/update/" style="padding-bottom:50px">
    <fieldset>
      <legend>Modifier un composant</legend>
      <div class="form-group d-none">
        <label for="exampleInputPassword1">ID:</label>
        <input type="text" value="<?= $component->id ?>" name="id" id="exampleInputPassword1" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Model:</label>
        <input type="text" value="<?= $component->model ?>" name="model" id="exampleInputPassword1" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Marque:</label>
        <input type="text" value="<?= $component->marque ?>" name="marque" id="exampleInputPassword1" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">PassMark :</label>
        <input type="number" value="<?= $component->point_puissance ?>" name="pointPuissance" id="exampleInputPassword1" class="form-control">
      </div>
      <div class="form-group">
        <label for="categorieComposantCreate">Categorie</label>
        <select multiple="" name="categorie" class="form-control" id="categorieComposantCreate">
          <?php foreach ($categories as $value): ?>
            <?php if ($value->id == $component->id_cat){ ?>
              <option value="<?= $value->id ?>" selected><?= $value->name ?></option>
            <?php }else{ ?>
              <option value="<?= $value->id ?>"><?= $value->name ?></option>
            <?php } ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="pictureComposantUpdate">Image</label>
        <input type="file" name="picture" id="pictureComposantUpdate" class="form-control-file" />
      </div>
      <div class="form-group">
        <img src="/public/picture/composants/<?= $pictureComponent->picture ?>" alt="image de composant" style="max-width:200px">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
