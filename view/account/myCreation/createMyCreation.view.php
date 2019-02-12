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
          <div class="form-group">
            <label for="nameCreation">Nom</label>
            <input name="name" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp">
            <?= errorsForm('name') ?>
          </div>
          <div class="form-group">
            <label for="descriptionCreation">Description</label>
            <input name="description" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp">
            <?= errorsForm('description') ?>
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
