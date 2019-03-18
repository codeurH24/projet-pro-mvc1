<?php require 'view/admin/headerAdmin.php' ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <div class="text-right">
        <a href="/admin/utilisateurs/creer-un-utilisateur.php" class="btn btn-secondary">Nouvel Utilisateur</a>
      </div>
    </div>
    <div class="col-9 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1 d-none d-sm-block">
          <span class="align-middle">ID</span>
        </div>
        <div class="col">
          <span class="align-middle">Pseudo</span>
        </div>
        <div class="col d-none d-sm-block">
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
        <div class="col-1 d-none d-sm-block" style="height:21px;">
          <p><?= $user->id ?></p>
        </div>
        <div class="col" style="height:21px;">
          <p><?= $user->pseudo ?></p>
        </div>
        <div class="col d-none d-sm-block" style="height:21px;">
          <p><?= $user->email ?></p>
        </div>
        <div class="col" style="height:21px;z-index:10">
          <select name="idRole" data-user-id="<?= $user->id ?>" disabled>
            <?php foreach ($roles as $role): ?>
              <?php if ($user->id_role == $role->id): ?>
                <option value="<?= $role->id ?>" selected><?= $role->nom ?></option>
              <?php else: ?>
                <option value="<?= $role->id ?>"><?= $role->nom ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col" style="height:21px;">
          <p><?= date('d/m/Y', strtotime($user->date_registration))   ?></p>
        </div>
        <div class="col-12 admin-tools-users" style="z-index:1">
          <span class="align-middle">
            <ul class="text-right">
              <li><a href="/admin/utilisateurs/montrer-un-utilisateur-<?= $user->id ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
              <li><a href="/admin/utilisateurs/supprimer-un-utilisateur-<?= $user->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
              <li><a href="/admin/utilisateurs/modifier-un-utilisateur-<?= $user->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
              <li><a href="/admin/utilisateurs/demande-de-nouveau-mot-de-passe-<?= $user->id ?>.php"><i class="fas fa-undo-alt"></i> <i class="fas fa-2x fa-key"></i></a></li>
            </ul>
          </span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script>
  var select = document.getElementsByTagName("select");
  for(var i = 0, max = select.length; i < max; i++)
  {
      select[i].disabled = false;
  }
</script>
<?php require 'view/admin/footerAdmin.php' ?>
