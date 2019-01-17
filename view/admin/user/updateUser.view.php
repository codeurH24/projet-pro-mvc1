<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post" action="/admin/utilisateurs/store/">
        <fieldset>
          <legend>Modification de l'utilisateur</legend>
          <div class="form-group">
            <label for="idUserUpdate">id</label>
            <input name="idUserUpdate" type="text" class="form-control" id="idUserUpdate" value="14">
          </div>
          <div class="form-group">
            <label for="nomUserUpdate">Nom</label>
            <input name="nomUserUpdate" type="text" class="form-control" id="nomUserUpdate" value="florent">
          </div>
          <div class="form-group">
            <label for="prenomUserUpdate">Prénom</label>
            <input name="prenomUserUpdate" type="text" class="form-control" id="prenomUserUpdate" value="Corlouer">
          </div>
          <div class="form-group">
            <label for="pseudoUserUpdate">Pseudo</label>
            <input name="pseudoUserUpdate" type="text" class="form-control" id="pseudoUserUpdate" value="admin master">
          </div>
          <div class="form-group">
            <label for="emailUserUpdate">E-mail</label>
            <input name="emailUserUpdate" type="text" class="form-control" id="emailUserUpdate" value="cci.corlouer@gmail.com">
          </div>
          <div class="form-group">
            <label for="ageUserUpdate">Age</label>
            <input name="ageUserUpdate" type="text" class="form-control" id="ageUserUpdate" value="33">
          </div>
          <div class="form-group">
            <label for="IDRoleUserUpdate">Role</label>
            <!-- 4 -->
            <select name="IDRoleUserUpdate" type="text" class="form-control" id="IDRoleUserUpdate" value="4">
              <option value="1">membre</option>
              <option value="2">contributeur</option>
              <option value="3">admin</option>
              <option value="4" selected="">super admin</option>
            </select>
          </div>
          <div class="text-right">
            <button type="submit" name="updateUserTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
    <?php require 'view/admin/footerAdmin.php' ?>
