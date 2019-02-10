<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-8">
    <form method="post" action="/mon-compte/changer-mon-adresse-e-mail/logout/">
      <fieldset>
        <legend>Information</legend>
        <div class="form-group">
          <label for="nom">
            Votre nouvelle adresse email vient d'être valider<br />
            Vous pouvez des à present vous connecter avec celle-ci
          </label>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Me connecter</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
