
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
          <div class="col-1">
            <button class="buttonNone" type="submit" name="deleteItemCreation"><i class="fas fa-2x fa-trash icon-white"></i></button>
            <input type="hidden" value="<?= $value->id ?>" name="idItem" />
            <input type="hidden" value="<?= $_GET['id'] ?>" name="idCreation" />
          </div>
          <div class="col-10">
            <?php if (accessElement('/admin/composant/')): ?>
              <a href="/admin/composant/montrer-composant-<?= $value->id_component ?>.php">
                <?= $value->model ?? '<p class="error">Composant inexistant sur site</p>' ?>
              </a>
            <?php else: ?>
                <?= $value->model ?? '<p class="error">Composant inexistant sur site</p>' ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php endforeach; ?>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
