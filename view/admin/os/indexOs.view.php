<?php require 'view/admin/headerAdmin.php' ?>
    <div class="col-8 mb-3">
      <div class="row">
        <div class="col">
          <div class="text-right">
            <a href="/admin/os/creer-un-os.php" class="btn btn-secondary">Ajouter un Systeme</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1">
          <span class="align-middle">ID</span>
        </div>
        <div class="col-2">
          <span class="align-middle">Image</span>
        </div>
        <div class="col">
          <span class="align-middle">Nom</span>
        </div>
      </div>
      <?php foreach ($oss as $value): ?>
        <div class="row">
          <div class="col-1" style="height:21px;">
            <p><?= $value->id ?></p>
          </div>
          <div class="col-2">
            <p>
              <img src="/public/picture/OS/<?= $value->picture ?>" alt="image du systeme" width="64"/>
            </p>
          </div>
          <div class="col" style="height:21px;">
            <p><?= $value->name ?></p>
          </div>
          <div class="col-12 admin-tools-users" style="z-index:1">
            <span class="align-middle">
              <ul class="text-right">
                <li><a href="/admin/os/supprimer-un-os-<?= $value->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
                <li><a href="/admin/os/modifier-un-os-<?= $value->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
              </ul>
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>


<?php require 'view/admin/footerAdmin.php' ?>
