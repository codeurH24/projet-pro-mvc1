<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <?php if(isset($_GET['pagination'])) require 'view/admin/log/pagination.php'; ?>
  <div class="arrayHTML mb-3">
    <table>
      <tbody><tr>
        <td class="entete">Utilisateur</td>
        <td class="entete">Action</td>
        <td class="entete">Date et Heure</td>
      </tr>
      <?php foreach ($logs as $log): ?>
      <tr>
        <td><?= $log->user_id ?></td>
        <td><?= $log->name_task ?></td>
        <td><?= $log->date ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody></table>
  </div>
  <?php if(isset($_GET['pagination'])) require 'view/admin/log/pagination.php'; ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
