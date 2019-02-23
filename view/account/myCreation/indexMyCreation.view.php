<div class="text-right">
  <a href="/mes-creations/creer-une-creation.php" class="btn btn-secondary">Nouvelle Configuration</a>
</div>
<!-- liste les créations pour pouvoir manipuler ces configs par la suite et avoir un aperçu pour le moment -->
<?php foreach ($creationList as $key => $creation) {

  // met en évidence le premier element car il est actif
  if ($creation->enable){
    ?><div class="creationsIndex active"><?php
  }else{
    ?><div class="creationsIndex"><?php
  }
  ?>
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-1">
        <?php if (!empty($creation->picture)): ?>
          <img src="/public/picture/OS/<?= $creation->picture; ?>" alt="image systeme" style="width:100%" />
        <?php endif; ?>
      </div>
      <div class="col-8">
        <!-- titre de la creation -->
        <h4 data-toggle="collapse" data-target="#form<?= $creation->id; ?>" class="d-inline-block">
          <?= $creation->name; ?>
        </h4>
      </div>
      <!-- boutons des actions possible sur la création -->
      <div class="toolsCreations col-3">
        <a href="detail/<?= $creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-file-invoice icon-white"></i></a>
        <a href="/mes-creations/modifier-une-creation-<?= $creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-pen icon-white"></i></a>
        <a href="/mes-creations/supprimer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-trash icon-white"></i></a>
        <?php if ($creation->enable){ ?>
          <a href="/mes-creations/activer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="far fa-3x fa-lightbulb icon-white"></i></a>
        <?php }else{ ?>
          <a href="/mes-creations/activer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-lightbulb"></i></a>
        <?php } ?>
      </div>
    </div>
  </div>



    <!-- liste les conposants mis dans la création, cela permet un bref aperçu de ce que contient la création  -->
    <div id="form<?= $creation->id ?>" class="collapse info" >
      <?php
          foreach (getComponentOfCreationUser($creation->id) as $composant) {
            ?><div><?= $composant->model ?></div><?php
          }
      ?>
    </div>

  </div>

<?php }
