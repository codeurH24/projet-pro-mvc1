<?php require 'view/admin/headerAdmin.php' ?>
<div class="col-12 col-md-8 col-xl-6">
  <div class="text-right mb-3">
    <a href="/admin/composant/" class="btn btn-secondary">Retour</a>
  </div>
  <form method="post" class="arrayHTML mb-3">
    <table>
        <h2><?= $component->model ?></h2>
      <tbody>
      <tr>
        <td for="idUserUpdate"></td>
        <td><img src="/public/picture/composants/<?= $pictureComponent->picture ?>" alt="image de composant" style="max-width:200px"></td>
      </tr>
      <tr>
        <td for="idUserUpdate">id</td>
        <td><?= $component->id ?></td>
      </tr>
      <tr>
        <td for="nomUserUpdate">marque</td>
        <td><?= $component->marque ?></td>
      </tr>
      <tr>
        <td for="nomUserUpdate">puissance</td>
        <td><?= $component->point_puissance ?></td>
      </tr>
      <tr>
        <td for="nomUserUpdate">Catégorie</td>
        <td>
          <?php
          foreach ($categories as $value){
            if ($value->id == $component->id_cat){
                echo $value->name;
            }
          }
          ?>
        </td>
      </tr>
    </tbody>
    </table>
  </form>
  <?php require 'view/admin/component/show/indexTag.view.php' ?>
</div>
<?php require 'view/admin/footerAdmin.php' ?>
