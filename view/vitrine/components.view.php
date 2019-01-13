<main class="container-fluid composants">
<?php
  require 'view/vitrine/pagination.php';
  foreach ($components as $value){
    require 'view/vitrine/component-item.view.php';
  }
  require 'view/vitrine/pagination.php';
?>
</main>
