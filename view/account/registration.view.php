<main class="container-fluid <?= $class ?>">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <?php if (isset($_SESSION['message']['success'])): ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['message']['success'] ?>
          <?php unset($_SESSION['message']) ?>
        </div>
      <?php endif; ?>
      <form method="post" action="/mon-compte/create-inscription/">
        <fieldset>
          <legend>Inscription</legend>
          <div class="form-group">
            <label for="pseudo">Pseudonyme</label>
            <input name="pseudo" type="text" class="form-control" id="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>" />
            <?= errorsForm('pseudo') ?>
          </div>
          <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $_POST['email'] ?? '' ?>" />
            <?= errorsForm('email') ?>
          </div>
          <div class="form-group">
            <label for="password1">Mot de passe</label>
            <input name="password1" type="password" class="form-control" id="password1" value="<?= $_POST['password1'] ?? '' ?>" />
            <?= errorsForm('password1') ?>
          </div>
          <div class="form-group">
            <label for="password2">Confirmer le mot de passe</label>
            <input name="password2" type="password" class="form-control" id="password2" value="<?= $_POST['password2'] ?? '' ?>" />
            <?= errorsForm('password2') ?>
          </div>
          <div class="text-right">
            <button type="submit" name="createRegistration" class="btn btn-primary">M'inscrire</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</main>
