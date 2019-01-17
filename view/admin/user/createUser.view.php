<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" action="/admin/utilisateurs/store/">
    <fieldset>
      <legend>Creer l'utilisateur</legend>
      <div class="form-group">
        <label for="nom">Nom</label>
        <input name="lastname" type="text" class="form-control" id="nom" value="Luca" />
        <p class="error">We'll never share your email with anyone else.</p>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input name="firstname" type="text" class="form-control" id="prenom"value="luc" />
        <p class="error">We'll never share your email with anyone else.</p>
      </div>
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input name="pseudo" type="text" class="form-control" id="pseudo" value="vador" />
        <p class="error">We'll never share your email with anyone else.</p>
      </div>
      <div class="form-group">
        <label for="mail">Adresse e-mail</label>
        <input name="email" type="email" class="form-control" id="mail" value="vador@gmail.com" />
        <p class="error">We'll never share your email with anyone else.</p>
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input name="age" type="text" class="form-control" id="age" value="18" />
      </div>
      <div class="form-group">
        <label for="password1">Mot de passe</label>
        <input name="password1" type="password" class="form-control" id="password1" value="1234">
      </div>
      <div class="form-group">
        <label for="password2">Confirmer le mot de passe</label>
        <input name="password2" type="password" class="form-control" id="password2" value="1234">
      </div>
      <div class="form-group">
        <select name="id_role">
          <option value="1">1</option>
          <?php foreach ($roles as $role): ?>
          <option value="<?= $role->id  ?>"><?= $role->nom  ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="text-right">
        <button type="submit" name="createUserTable" class="btn btn-primary">Creer</button>
      </div>
    </fieldset>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
