<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post" action="/admin/utilisateurs/update/">
        <fieldset>
          <legend>Modification de l'utilisateur</legend>
          <div class="form-group">
            <label for="idUserUpdate">id</label>
            <input name="id" type="text" class="form-control" id="idUserUpdate" value="<?= $user->id ?>">
          </div>
          <div class="form-group">
            <label for="nomUserUpdate">Nom</label>
            <input name="lastname" type="text" class="form-control" id="nomUserUpdate" value="<?= $user->nom ?>">
          </div>
          <div class="form-group">
            <label for="prenomUserUpdate">Prénom</label>
            <input name="firstname" type="text" class="form-control" id="prenomUserUpdate" value="<?= $user->prenom ?>">
          </div>
          <div class="form-group">
            <label for="pseudoUserUpdate">Pseudo</label>
            <input name="pseudo" type="text" class="form-control" id="pseudoUserUpdate" value="<?= $user->pseudo ?>">
          </div>
          <div class="form-group">
            <label for="emailUserUpdate">E-mail</label>
            <input name="email" type="text" class="form-control" id="emailUserUpdate" value="<?= $user->email ?>">
          </div>
          <div class="form-group">
            <label for="ageUserUpdate">Age</label>
            <input name="age" type="text" class="form-control" id="ageUserUpdate" value="<?= $user->age ?>">
          </div>
          <div class="form-group">
            <label for="IDRoleUserUpdate">Role</label>
            <!-- 4 -->
            <select name="id_role" type="text" class="form-control" id="IDRoleUserUpdate" value="4">
              <?php foreach ($roles as $role): ?>
                <?php if ($user->id_role == $role->id){ ?>
                  <option value="<?= $role->id ?>" selected><?= $role->nom ?></option>
                <?php }else{ ?>
                  <option value="<?= $role->id ?>"><?= $role->nom ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="text-right">
            <button type="submit" name="updateUserTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
    <?php require 'view/admin/footerAdmin.php' ?>
