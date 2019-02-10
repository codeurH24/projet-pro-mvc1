<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" class="arrayHTML">
    <table>
      <?php if ( ($user->nom.$user->prenom != '')): ?>
          <h2>Profil de l'utilisateur </h2>
          <p><?= $user->prenom ?> <?= $user->nom ?> (<?= $user->pseudo ?>)</p>
      <?php else: ?>
        <h2>Profil de l'utilisateur <?= $user->pseudo ?></h2>
      <?php endif; ?>
      <tbody>
      <tr>
        <td for="idUserUpdate">id</td>
        <td><?= $user->id ?></td>
      </tr>
      <tr>
        <td for="nomUserUpdate">Nom</td>
        <td><?= $user->nom ?></td>
      </tr>
      <tr>
        <td for="prenomUserUpdate">Prénom</td>
        <td><?= $user->prenom ?></td>
      </tr>
      <tr >
        <td for="pseudoUserUpdate">Pseudo</td>
        <td><?= $user->pseudo ?></td>
      </tr>
      <tr >
        <td for="emailUserUpdate">E-mail</td>
        <td><?= $user->email ?></td>
      </tr>
      <tr>
        <td>Age</td>
        <td><?= $user->age ?></td>
      </tr>
      <tr >
        <td>Role</td>
        <td><?= $roleName ?? '' ?></td>
      </tr>
    </tbody>
    </table>
  </form>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
