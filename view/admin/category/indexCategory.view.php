<?php require 'view/admin/headerAdmin.php' ?>


    <div class="col-8 mb-3">
      <div class="text-right">
        <a href="/admin/categorie/creer-categorie.php" class="btn btn-secondary">Nouvelle Catégorie</a>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1">
          <span class="align-middle">ID</span>
        </div>
        <div class="col">
          <span class="align-middle">Nom</span>
        </div>
      </div>
      <?php foreach ($categories as $value): ?>
      <div class="row">
        <div class="col-1" style="height:21px;">
          <p><?= $value->id ?></p>
        </div>
        <div class="col" style="height:21px;">
          <p><?= $value->name ?></p>
        </div>
        <div class="col-12 admin-tools-users" style="z-index:1">
          <span class="align-middle">
            <ul class="text-right">
              <!-- <li><a href="/admin/categorie/montrer-categorie-2.php"><i class="far fa-2x fa-eye"></i></a></li> -->
              <li><a href="/admin/categorie/supprimer-categorie-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
              <li><a href="/admin/categorie/modifier-categorie-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
            </ul>
          </span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>


<?php require 'view/admin/footerAdmin.php' ?>
