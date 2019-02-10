<main class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post">
        <fieldset>
          <legend>Changement de mot de passe</legend>
          <p class="error"><?= $erreur ?? '' ?></p>
          <div class="form-group">
            <label for="newpassword1">Mot de passe</label>
            <input name="newpassword1" type="password" class="form-control" id="newpassword1" />
          </div>
          <div class="form-group">
            <label for="newpassword2">Confirmer le même mot de passe</label>
            <input name="newpassword2" type="password" class="form-control" id="newpassword2" />
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Changer</button>
          </div>
        </fieldset>
      </form>
    </div>
</main>
