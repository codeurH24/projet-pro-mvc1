<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="text-right">
    <a href="/admin/composant/compatibilite/creer-compatibilite.php" class="btn btn-secondary">Ajouter une compatibilité</a>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8 indexUser">
  <div class="row entete align-items-center">
    <div class="col-1">
      <span class="align-middle">ID</span>
    </div>
    <div class="col">
      <span class="align-middle">ID component1</span>
    </div>
    <div class="col">
      <span class="align-middle">ID component2</span>
    </div>
  </div>
  <?php foreach ($compatibilities as $value): ?>
  <div class="row">
    <div class="col-1" style="height:21px;">
      <p><?= $value->id ?></p>
    </div>
    <div class="col" style="height:21px;">
      <p><?= $value->id1 ?></p>
    </div>
    <div class="col" style="height:21px;">
      <p><?= $value->id2 ?></p>
    </div>
    <div class="col-12 admin-tools-users" style="z-index:1">
      <span class="align-middle">
        <ul class="text-right">
          <!-- <li><a href="/admin/composant/compatibilite/montrer-categorie-1.php"><i class="far fa-2x fa-eye"></i></a></li> -->
          <li><a href="/admin/composant/compatibilite/supprimer-compatibilite-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
          <li><a href="/admin/composant/compatibilite/modifier-compatibilite-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
        </ul>
      </span>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
