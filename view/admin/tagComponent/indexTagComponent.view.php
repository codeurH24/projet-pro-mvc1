<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="row">
    <div class="col-12 mt-3">
      <div class="text-right">
        <a href="/admin/composant/creer-composant.php" class="btn btn-secondary">Retour</a>
      </div>
    </div>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8">
  <form method="post">
    <fieldset>
      <legend>Tager les composants</legend>
      <div class="form-group">
        <label for="keyWord">Mot clé</label>
        <input type="text" name="keyWord" id="keyWord" class="form-control">
      </div>
      <div class="text-right">
        <button type="submit" name="searchForTagComposant" class="btn btn-primary">Recherche</button>
      </div>
      <div class="form-group">
        <label for="tagWord">Entrer en tag</label>
        <input type="text" name="tagWord" id="tagWord" class="form-control">
      </div>
      <div class="text-right">
        <button type="submit" name="tagsComposant" class="btn btn-primary">Tager</button>
      </div>
    </fieldset>
  </form>
  <div class="arrayHTML mt-4">
    <table>
      <?php
        $sqlTagCreate = "";
        foreach($listOfComponent as $key => $component){
        $id = $component->id;
        $sqlTagCreate .= "INSERT INTO `compatibility_tag` (`id_composant`, `tag`) VALUES ('$id', '%%tag%%');";
        ?><tr><td class="entete"><?= $component->id ?> <?= $component->model ?></td></tr><?php
        }
        $_SESSION['sqlTagComponentCreate'] = $sqlTagCreate;
      ?>
    </table>
  </div>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
