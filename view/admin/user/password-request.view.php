<?php require 'view/admin/headerAdmin.php' ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <form class="" action="/admin/utilisateurs/sendEmailPasswordChange/" method="post">
        <fieldset>
          <legend>NOUVEAU MOT DE PASSE</legend>
          <div class="form-group">
            <label for="">Désirez-vous faire une demande de réinitialisation du mot de passe ?</label>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
          </div>
          <div class="form-group text-right">
            <input class="btn btn-primary" type="submit" name="answerChangePassword" value="Oui" />
            <input type="submit" name="answerChangePassword" value="Non" />
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
