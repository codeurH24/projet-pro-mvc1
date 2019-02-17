
<?php require 'view/account/headerMyAccount.php';?>

<div class="text-right">
  <a href="/mes-creations/" class="btn btn-secondary">Mes créations</a>
</div>

<h1><?= $titreCreation ?></h1>
<div>
<?php
// debug($componentsList);
foreach ($componentsList as $key => $value): ?>
  <div>
    <form method="post" action="/mes-creations/deleteItemCreation/" class="showCreationItem">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <input type="hidden" value="<?= $value->id ?>" name="idItem" />
            <input type="hidden" value="<?= $_GET['id'] ?>" name="idCreation" />
            <button class="buttonNone" type="submit" name="deleteItemCreation"><i class="fas fa-2x fa-trash icon-white"></i></button>
          </div>
          <div class="col-10">
            <a href="/admin/composant/montrer-composant-<?= $value->id_composant ?>.php">
            <?= $value->model ?? '<p class="error">Composant inexistant sur site</p>' ?>
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php endforeach; ?>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
