<?php require 'view/account/headerMyAccount.php';?>
<div class="text-right">
  <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>
<h4><?= $creation->name ?></h4>
<form method="post" action="/mes-creations/update.php" style="padding-bottom:50px">
    <div class="form-group d-none">
      <label for="idCreationUpdate">ID:</label>
      <input type="text" value="<?= $creation->id ?>" name="id" id="idCreationUpdate" class="form-control">
    </div>
    <div class="form-group">
      <label for="nameCreation">Nom</label>
      <input name="name" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp" value="<?= $creation->name ?>">
    </div>
    <div class="form-group">
      <label for="descriptionCreation">Description</label>
      <input name="description" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp" value="<?= $creation->description ?>">
    </div>
    <div class="form-group">
      <label for="idOs">Systeme d'exploitation</label>
      <select name="idOs" class="form-control"  id="idOs">
        <?php foreach ($os as $value): ?>
          <?php if ($value->id == $creation->id_os ): ?>
            <option value="<?= $value->id ?>" selected><?= $value->name ?></option>
          <?php else: ?>
            <option value="<?= $value->id ?>"><?= $value->name ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
      <?= errorsForm('idOs') ?>
    </div>
    <button type="submit" class="btn btn-primary">Modifier une création</button>
</form>
<?php require 'view/account/footerMyAccount.php'; ?>
