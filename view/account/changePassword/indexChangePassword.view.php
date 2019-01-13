<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-8">
    <form method="post" action="/mon-compte/changer-mon-mot-de-passe/update/">
      <fieldset>
        <legend>Changer le mot de passe</legend>
        <div class="error">
        </div>
        <div class="form-group">
          <label for="currentPasswordUserFromUser">Mot de passe actuel</label>
          <input name="currentPassword" type="password" class="form-control" id="currentPasswordUserFromUser" />
          <?php if (isset($_SESSION['formErrors']['currentPassword'])): ?>
            <div class="error">
              <?php foreach ($_SESSION['formErrors']['currentPassword'] as $value): ?>
                <p><?= $value ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="password1">Nouveau mot de passe</label>
          <input name="password1" type="password" class="form-control" id="password1" />
          <?php if (isset($_SESSION['formErrors']['password1'])): ?>
            <div class="error">
              <?php foreach ($_SESSION['formErrors']['password1'] as $value): ?>
                <p><?= $value ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="password2UserFromUser">Retapez le nouveau mot de passe</label>
          <input name="password2" type="password" class="form-control" id="password2" />
          <?php if (isset($_SESSION['formErrors']['password2'])): ?>
            <div class="error">
              <?php foreach ($_SESSION['formErrors']['password2'] as $value): ?>
                <p><?= $value ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Changer</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
