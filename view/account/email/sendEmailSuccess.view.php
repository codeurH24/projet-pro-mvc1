<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-8">
    <form method="post" action="/mon-compte/changer-mon-adresse-e-mail/cancelUpdateEmail/">
      <fieldset>
        <legend>Information</legend>
        <div class="form-group">
          <label for="nom">Un e-mail de confirmation vous a été envoyez à votre nouvelle adresse mail</label>
        </div>
        <div class="text-right">
          <button type="submit" name="cancelUpdateEmail" class="btn btn-primary">Annuler</button>
          <!-- <button type="submit" name="logout" class="btn btn-primary">Continuer</button> -->
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
