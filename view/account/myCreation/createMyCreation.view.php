<?php require 'view/account/headerMyAccount.php';?>
<div class="text-right buttonReturn">
  <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <form method="post" action="/mes-creations/store/">
        <fieldset>
          <legend>Créer une création</legend>
          <?= errorsForm('form') ?>
          <div class="form-group d-none">
            <input name="token" type="hidden" value="<?= $_SESSION['user']['csrf'] ?>" />
          </div>
          <div class="form-group">
            <label for="nameCreation">Nom</label>
            <input name="name" type="text" class="form-control" id="nameCreation" value="<?= $_POST['name'] ?? '' ?>" />
            <?= errorsForm('name') ?>
          </div>
          <div class="form-group">
            <label for="descriptionCreation">Description</label>
            <input name="description" type="text" class="form-control" id="descriptionCreation" value="<?= $_POST['description'] ?? '' ?>" />
            <?= errorsForm('description') ?>
          </div>
          <div class="form-group">
            <label for="idOs">Système d'exploitation</label>
            <select name="idOs" class="form-control"  id="idOs">
              <?php
              // si l'utilisateur n'a pas encore choisi un système alors
              // on affiche tous les systèmes disponibles
              if (!isset($_POST['idOs'])){
                foreach ($os as $value){
                  ?><option value="<?= $value->id ?>"><?= $value->name ?></option><?php
                }
              }else{ // sinon on affiche seulement le système qu'il a demandé
                foreach ($os as $value){
                  if ($value->id == $_POST['idOs'] ){
                    ?><option value="<?= $value->id ?>" selected><?= $value->name ?></option><?php
                  }else{
                    ?><option value="<?= $value->id ?>"><?= $value->name ?></option><?php
                  }
                }
              }
              ?>
            </select>
            <?= errorsForm('idOs') ?>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Créer une création</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
