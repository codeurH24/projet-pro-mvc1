<main class="container-fluid <?= $class ?>">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post" action="/mon-compte/connexion/submit/">
        <fieldset>
          <legend>Connexion</legend>
          <?= errorsForm('form') ?>
          <div class="form-group">
            <label for="email">Adresse E-mail</label>
            <input name="email" type="email" class="form-control" id="email" value="<?= $_POST['email'] ?? '' ?>" />
            <?= errorsForm('email') ?>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password" value="<?= $_POST['password'] ?? '' ?>" />
            <?= errorsForm('password') ?>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</main>
