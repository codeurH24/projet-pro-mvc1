<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="text-right">
    <a href="/admin/acces/creer-un-acces.php" class="btn btn-secondary">Nouvel Accès</a>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8 indexUser">
  <div class="row entete align-items-center">
    <div class="col-3">
      <span class="align-middle">Role </span>
    </div>
    <div class="col">
      <span class="align-middle">URL</span>
    </div>
    <div class="col-3">
      <span class="align-middle">Droit de passage</span>
    </div>
  </div>
  <?php foreach ($access as $key => $value): ?>
    <div class="row">
      <div class="col-3" style="height:21px;">
        <p><?= $value->nom ?></p>
      </div>
      <div class="col" style="height:21px;">
        <p><?= $value->url ?></p>
      </div>
      <div class="col-3" style="height:21px;">
        <p><?= $value->pass_right ?></p>
      </div>
      <div class="col-12 admin-tools-users" style="z-index:1">
        <span class="align-middle">
          <ul class="text-right">
            <li><a href="/admin/acces/montrer-un-acces-<?= $value->id ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
            <li><a href="/admin/acces/supprimer-un-acces-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
            <li><a href="/admin/acces/modifier-un-acces-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
          </ul>
        </span>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
