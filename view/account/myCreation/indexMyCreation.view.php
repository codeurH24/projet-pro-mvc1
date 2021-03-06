<div class="text-center">
  <h1>Mes créations</h1>
</div>
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
    <div class="row align-items-left itemCreation">
      <div class="col-3 col-md-2 col-lg-1 col-xl-1 infoIMG">
        <?php if (!empty($creation->picture)): ?>
          <img class="img-sys" src="/public/picture/OS/<?= $creation->picture; ?>" alt="image systeme" />
        <?php endif; ?>
      </div>
      <div class="col-9 col-md-8 col-lg-7 col-xl-8 infoName">
        <!-- titre de la creation  -->
        <h2   class="h4 d-inline-block">
            <a href="detail/<?= $creation->id ?>.php" class="d-inline-block icon-white">
                <?= $creation->name; ?>
            </a>
        </h2>
      </div>
      <!-- boutons des actions possibles sur la création -->
      <div class="toolsCreations col-12 col-md-12 col-lg-4 col-xl-3 infoTool">
        <a href="detail/<?= $creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-search-plus icon-white"></i></a>
        <a href="/mes-creations/modifier-une-creation-<?= $creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-pen icon-white"></i></a>
        <a href="/mes-creations/demande-pour-supprimer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-trash icon-white"></i></a>
        <?php if ($creation->enable){ ?>
          <a href="/mes-creations/activer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="far fa-3x fa-lightbulb icon-white"></i></a>
        <?php }else{ ?>
          <a href="/mes-creations/activer-une-creation-<?=$creation->id ?>.php" class="d-inline-block"><i class="fas fa-2x fa-lightbulb"></i></a>
        <?php } ?>
      </div>
    </div>
  </div>



    <!-- liste les composants mis dans la création, cela permet un bref aperçu de ce que contient la création  -->
    <div id="form<?= $creation->id ?>" class="collapse info" >
      <?php
          foreach (getComponentOfCreationUser($creation->id) as $composant) {
            ?><div><?= $composant->model ?></div><?php
          }
      ?>
    </div>

  </div>

<?php }
