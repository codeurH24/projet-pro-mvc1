<?php require 'view/account/headerMyAccount.php';?>
<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-xl-6">
    <div class="text-right mb-3">
      <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
    </div>
    <form method="post" action="/mes-creations/deleteRequest/">
      <fieldset>
        <legend>Suppression</legend>
        <div class="form-group">
          <label for="nom">Souhaitez-vous réellement supprimer cette création ?</label>
          <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
        </div>
        <div class="text-right">
          <a href="/mes-creations/supprimer-une-creation-<?= $_GET['id'] ?>-<?= $_SESSION['user']['csrf'] ?>.php" class="btn btn-danger ">Oui</a>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php require 'view/account/footerMyAccount.php'; ?>
