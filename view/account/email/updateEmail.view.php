<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-8">
    <form method="post" action="/mon-compte/changer-mon-adresse-e-mail/send/">
      <fieldset>
        <legend>Changer mon adresse e-mail</legend>
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
          <label for="email1">Nouvelle adresse</label>
          <input name="email1" type="text" class="form-control" id="email1" />
          <?php if (isset($_SESSION['formErrors']['email1'])): ?>
            <div class="error">
              <?php foreach ($_SESSION['formErrors']['email1'] as $value): ?>
                <p><?= $value ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="email2">Retapez la nouvelle adresse</label>
          <input name="email2" type="text" class="form-control" id="email2" />
          <?php if (isset($_SESSION['formErrors']['email2'])): ?>
            <div class="error">
              <?php foreach ($_SESSION['formErrors']['email2'] as $value): ?>
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
