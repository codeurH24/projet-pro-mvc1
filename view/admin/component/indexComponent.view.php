<?php require 'view/admin/headerAdmin.php' ?>
<div class="row justify-content-center">
  <div class="col-8 mb-3">
    <div class="row">
      <div class="col-4">
        <div class="text-center">
          <a href="/admin/composant/compatibilite/" class="btn btn-secondary">Compatibilité</a>
        </div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="/admin/composant/lien-du-revendeur/" class="btn btn-secondary">Lien de revente</a>
        </div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="/admin/tagComponent/" class="btn btn-secondary">Tager</a>
        </div>
      </div>
      <div class="col-12 mt-3">
        <div class="text-right">
          <a href="/admin/composant/creer-composant.php" class="btn btn-secondary">Nouveau Composant</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-11 col-lg-8 indexUser">
    <div class="row entete align-items-center">
      <div class="col-1">
        <span class="align-middle">ID</span>
      </div>
      <div class="col">
        <span class="align-middle">Model</span>
      </div>
      <div class="col-1">
        <span class="align-middle">Points</span>
      </div>
      <div class="col-1">
        <span class="align-middle">Cat</span>
      </div>
    </div>
    <?php foreach ($components as $value): ?>

      <div class="row">
        <div class="col-1" style="height:21px;">
          <p><?= $value->id ?></p>
        </div>
        <div class="col" style="height:21px;">
          <p><?= $value->model ?></p>
        </div>
        <div class="col-1" style="height:21px;">
          <p><?= $value->point_puissance ?></p>
        </div>
        <div class="col-1" style="height:21px;">
          <p><?= $value->id_cat ?></p>
        </div>
        <div class="col-12 admin-tools-users" style="z-index:1">
          <span class="align-middle">
            <ul class="text-right">
              <li><a href="/admin/composant/montrer-composant-<?= $value->id ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
              <li><a href="/admin/composant/supprimer-composant-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
              <li><a href="/admin/composant/modifier-composant-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
            </ul>
          </span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
