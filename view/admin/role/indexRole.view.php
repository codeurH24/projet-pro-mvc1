<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="text-right">
    <a href="/admin/roles/creer-role.php" class="btn btn-secondary">Nouveau Role</a>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8 indexUser">
  <div class="row entete align-items-center">
    <div class="col-1">
      <span class="align-middle">ID</span>
    </div>
    <div class="col">
      <span class="align-middle">Role</span>
    </div>
  </div>
  <?php foreach ($roles as $role): ?>
    <div class="row">
      <div class="col-1" style="height:21px;">
        <p><?= $role->id ?></p>
      </div>
      <div class="col" style="height:21px;">
        <p><?= $role->nom ?></p>
      </div>
      <div class="col-12 admin-tools-users" style="z-index:1">
        <span class="align-middle">
          <ul class="text-right">
            <li><a href="/admin/roles/montrer-role-<?= $role->id ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
            <li><a href="/admin/roles/supprimer-role-<?= $role->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
            <li><a href="/admin/roles/modifier-role-<?= $role->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
          </ul>
        </span>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
