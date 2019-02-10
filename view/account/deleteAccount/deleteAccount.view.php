<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-8">
    <form method="post" action="/mon-compte/supprimer-mon-compte/delete/">
      <fieldset>
        <legend>Information</legend>
        <div class="form-group">
          <label>Désirez-vous réellement supprimer votre compte ?</label>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-danger">Oui, supprimer mon compte</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
