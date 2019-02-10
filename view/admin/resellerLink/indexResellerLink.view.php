<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-8 mb-3">
  <div class="text-right">
    <a href="/admin/composant/lien-du-revendeur/creer-lien-de-revente.php" class="btn btn-secondary">Nouveau lien</a>
  </div>
</div>
<div class="col-12 col-md-11 col-lg-8 indexUser">
  <div class="row entete align-items-center">
    <div class="col-1">
      <span class="align-middle">ID</span>
    </div>
    <div class="col">
      <span class="align-middle">id_revendeur</span>
    </div>
    <div class="col">
      <span class="align-middle">id_composant</span>
    </div>
    <div class="col-1">
      <span class="align-middle">lien</span>
    </div>
    <div class="col-1">
      <span class="align-middle">prix</span>
    </div>
  </div>
  <?php foreach ($resellerLinks as $value): ?>
  <div class="row">
    <div class="col-1" style="height:21px;">
      <p><?= $value->id ?></p>
    </div>
    <div class="col" style="height:21px;">
      <p><?= $value->id_revendeur ?></p>
    </div>
    <div class="col" style="height:21px;">
      <p><?= $value->id_composant ?></p>
    </div>
    <div class="col-1" style="height:21px;">
      <p><a href="<?= $value->lien ?>">Lien</a></p>
    </div>
    <div class="col-1" style="height:21px;">
      <p><?= $value->prix ?></p>
    </div>
    <div class="col-12 admin-tools-users" style="z-index:1">
      <span class="align-middle">
        <ul class="text-right">
          <!-- <li><a href="/admin/categorie/montrer-categorie-1.php"><i class="far fa-2x fa-eye"></i></a></li> -->
          <li><a href="/admin/composant/lien-du-revendeur/supprimer-lien-de-revente-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
          <li><a href="/admin/composant/lien-du-revendeur/modifier-lien-de-revente-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
        </ul>
      </span>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
