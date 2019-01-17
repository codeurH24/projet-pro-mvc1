<?php require 'view/admin/headerAdmin.php' ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <div class="text-right">
        <a href="/admin/utilisateurs/creer-un-utilisateur.php" class="btn btn-secondary">Nouvel Utilisateur</a>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1">
          <span class="align-middle">ID</span>
        </div>
        <div class="col">
          <span class="align-middle">Pseudo</span>
        </div>
        <div class="col">
          <span class="align-middle">E-mail</span>
        </div>
        <div class="col">
          <span class="align-middle">Droit</span>
        </div>
        <div class="col">
          <span class="align-middle">Date d'inscription</span>
        </div>
      </div>
      <?php foreach ($users as $user): ?>
      <div class="row">
        <div class="col-1" style="height:21px;">
          <p><?= $user->id ?></p>
        </div>
        <div class="col" style="height:21px;">
          <p><?= $user->pseudo ?></p>
        </div>
        <div class="col" style="height:21px;">
          <p><?= $user->email ?></p>
        </div>
        <div class="col" style="height:21px;z-index:10">
          <select name="" disabled="">
            <option value="1">membre</option><option value="2">contributeur</option><option value="3">admin</option><option value="4" selected="">super admin</option>
          </select>
        </div>
        <div class="col" style="height:21px;">
          <p>30-09-18</p>
        </div>
        <div class="col-12 admin-tools-users" style="z-index:1">
          <span class="align-middle">
            <ul class="text-right">
              <li><a href="/admin/utilisateurs/show-user-14.php"><i class="far fa-2x fa-eye"></i></a></li>
              <li><a href="/admin/utilisateurs/supprimer-user-14.php"><i class="fas fa-2x fa-trash"></i></a></li>
              <li><a href="/admin/utilisateurs/modifier-user-14.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
              <li><a href="/admin/utilisateurs/14/demander-un-nouveau-mot-de-passe"><i class="fas fa-undo-alt"></i> <i class="fas fa-2x fa-key"></i></a></li>
            </ul>
          </span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
