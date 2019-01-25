<?php require 'view/admin/headerAdmin.php' ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <h2>NOUVEAU MOT DE PASSE</h2>
      <form class="" action="/admin/utilisateurs/sendEmailPasswordChange/" method="post">
        <fieldset>
          <div class="form-group">
            <legend>Désirez-vous faire une demande de réinitialisation du mot de passe ?</legend>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
          </div>
          <div class="form-group text-right">
            <input type="submit" name="answerChangePassword" value="Oui" />
            <input type="submit" name="answerChangePassword" value="Non" />
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
