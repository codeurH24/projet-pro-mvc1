<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelTagComponent.php';
function livelyMemory(){
  $categorie = 'mémoire vive';
  $whereIN = [];

  if(UID() !== false){
    $whereIN = infoConfig();

    if (infoConfig_numberOfRAM() >= infoConfig_numberOfSlotsRAM()) {
      $_SESSION['notification'] = 'Il n\'y a plus de place sur la carte mère pour accueillir une nouvelle barrette de ram';
      header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
      exit;
    }
  }

  $numbersPerPage = 5;
  $numberOfProcessors =  count(getComponents($categorie, $whereIN));
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($categorie, $limit) === false){
    view('errors/404.view.php');
    exit;
  }
  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($categorie, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/memoire-vive-',
    'class' => 'pageBackgroundDDR'
  ]);
}

function mainBoard(){
  $categorie = 'carte mère';
  $whereIN = [];

  // ont regarde la config seulement si l'utilisateur est connecté
  if(UID() !== false) {
      if (infoConfig_hasMainboard() === true) {
        $_SESSION['notification'] = 'Aucune carte mère de disponible tant que vous aurez une carte mère dans votre création';
        header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
        exit;
      }
      if (infoConfig_hasMainboard() === false){
        // limite les cartes mères affichées en fonction des barrettes mémoire déjà dans la config
        $numberOfRAM = infoConfig_numberOfRAM(); // recupere le nombre de barrette mémoire depuis la config
        // genère les filtres d'affichage qui determinent les CM a affichées.
        // Seul les CM ayant au minimum le nombre de barrettes déjà présent dans la config seront selectionnées
        if ($numberOfRAM > 2) {
          for ($i=$numberOfRAM; $i < 10; $i++) {
            if($i == 1){
              $whereIN[] = $i.' fente RAM';
            }else{
              $whereIN[] = $i.' fentes RAM';
            }
          }
        }
      } // hasMainboard()
  }// UID


  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents($categorie);
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($categorie, $limit, $whereIN) === false){
    view('errors/404.view.php');
    exit;
  }

  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($categorie, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-mere-',
    'class' => 'pageBackgroundMotherboard'
  ]);
}

function processor(){
  // INFO SURL LA CONFIG ACTUEL
  $categorie = 'processeur';
  $whereIN = [];

  if(UID() !== false) {
      $whereIN = infoConfig();
  }




  // selon les tags de la carte mere, nous pouvons filtrer l'affichage
  // des processeurs
  // AFFICHAGE DES COMPOSANTS SUR LA PAGE

  $numbersPerPage = 5;
  $numberOfProcessors =  count(getComponents($categorie, $whereIN));
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)$numberOfProcessors  === false){
    view('errors/404.view.php');
    exit;
  }

  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($categorie, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/processeur-',
    'class' => 'pageBackgroundProcessor'
  ]);
}

function graphicCard(){
  $categorie = 'carte graphique';
  $whereIN = [];


  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents($categorie);
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($categorie, $limit) === false){
    view('errors/404.view.php');
    exit;
  }
  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($categorie, $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-graphique-',
    'class' => 'pageBackgroundGraphicCard'
  ]);
}


function addComponent(){
  if(UID() === false) {
    exit('Vous devez être connecté');
  }



  if(infoConfig_hasMainboard() !== false && isMainboard()){
    $_SESSION['notification'] = 'Une seule carte mère par création est autorisé';
    header('Location: '.back());
    exit;
  }


  if(infoConfig_hasProcessor() !== false && isProcessor()){
    $_SESSION['notification'] = 'Un seul processeur par création est autorisé';
    header('Location: '.back());
    exit;
  }

  if (isRAM()) {
    $cfgTypeRAM = infoConfig_typeOfRAM();
    debug(getTag('ddr3'));
    exit('non trouvé');
  }

  if(isMainboard()){
    $numberOfRAM = infoConfig_numberOfRAM();

    if( $numberOfRAM > numberOfSlotsRAM($_POST['id']) ){
      $_SESSION['notification'] = 'Votre création a trop de RAM pour accepter cette carte mère';
      header('Location: '.back());
      exit;
    }
  }else{
    $infoConfig_numberOfSlotsRAM = infoConfig_numberOfSlotsRAM();
    $numberOfRAM = infoConfig_numberOfRAM();

    if( $numberOfRAM >= $infoConfig_numberOfSlotsRAM){
      $_SESSION['notification'] = 'Votre carte mère n\'a plus assez d\'emplacements pour ajouter encore une barrette de RAM';
      header('Location: '.back());
      exit;
    }
  }



  $id = whoIsEnableInMyCreation();
  $CreationConception = new CreationConception();
  $CreationConception->setIdComposant($_POST['id']);
  $CreationConception->setIdCreation($id);
  $CreationConception->setIdUser(UID());
  $CreationConception->setDateCreate(dbDate());
  $CreationConception->createCreationConception();
  header('Location: '.back());
}




function numberOfSlotsRAM($idMainBoard){
  $component = getComponent($idMainBoard);
  $Tag = new Tag();
  $tags = $Tag->select([
    ['id_composant', '=', $component->id]
  ])->gets();
  foreach ($tags as $tag) {
    $whereIN[]= $tag->tag; // on recupere les tags de la carte mere
  }
  return infoConfig_numberOfSlotsRAM($whereIN);
}

function infoConfig_numberOfSlotsRAM($whereIN=[]){
  if(count($whereIN) == 0){
    $whereIN = infoConfig();
  }

  $numberOfSlots= 99;
  // recupere le nombre de fentes mémoire vive pour
  // empecher d'en ajouter plus que la carte mere le permet
  if ($arr = preg_grep ('/^([0-9]+) fentes RAM/i', $whereIN)) {
      $numberOfSlots = explode(' ', implode($arr))[0];
  }
  return $numberOfSlots;
}

function infoConfig_ID(){
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;
  return $ID_creationEnable;
}

function infoConfig_numberOfRAM(){
  // recherche des composant deja ajouter a la config
  // en particulier les composant de RAM
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;

  $CreationConception = new CreationConception();
  $componentsRAM= $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 4]// categorie 4  =  mémoire vive
  ])->gets();
  // retourne les resultats en comptant les lignes de resultat
  if( $componentsRAM !== false){
    return count($componentsRAM);
  }else{
    return false;
  }
}

function infoConfig_hasProcessor(){
  // recherche des composant deja ajouter a la config
  // en particulier les composant de RAM
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;

  $CreationConception = new CreationConception();
  $componentsRAM = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 8]// categorie 8  =  processeur
  ])->gets();
  // retourne les resultats en comptant les lignes de resultat
  if( $componentsRAM !== false){
    return count($componentsRAM);
  }else{
    return false;
  }
}

function isMainboard(){
  // verifier que le composant qui va etre ajouté est une carte mère
  $componentMainBoard = getComponent($_POST['id']);
  if($componentMainBoard !== false && !empty($componentMainBoard)  && $componentMainBoard->id_cat == 9){
    return true;
  }else{
    return false;
  }
}

function isProcessor(){
  // verifier que le composant qui va etre ajouté est un processeur
  $componentProcesseor = getComponent($_POST['id']);
  if($componentProcesseor !== false && !empty($componentProcesseor)  && $componentProcesseor->id_cat == 8){
    return true;
  }else{
    return false;
  }
}

function isRAM(){
  // verifier que le composant qui va etre ajouté est un processeur
  $componentProcesseor = getComponent($_POST['id']);
  if($componentProcesseor !== false && !empty($componentProcesseor)  && $componentProcesseor->id_cat == 4){
    return true;
  }else{
    return false;
  }
}

function infoConfig_hasMainboard(){
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;

  $CreationConception = new CreationConception();
  $componentMainBoard = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 9]// categorie 9 =  carte mere
  ])->get();
  if($componentMainBoard !== false){
    return true;
  }else{
    return false;
  }
}

function infoConfig_typeOfRAM(){
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;

  $CreationConception = new CreationConception();
  $componentRAM = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 4]// categorie 4 =  mémoire vive
  ])->get();
  if ($componentRAM !== false) {
    // on peut recuprer son id pour le réutiliser pour obtenir ses tags
    $idRAM = $componentRAM->id_composant;

    $Tag = new Tag();
    $tags = $Tag->select([
      ['id_composant', '=', $idRAM]
    ])->gets();
    foreach ($tags as $tag) {
      $whereIN[]= $tag->tag; // on recupere les tags de la RAM
    }
    if ($arr = preg_grep ('/^ddr5/i', $whereIN)) {
        return $arr[0];
    }
    if ($arr = preg_grep ('/^ddr4/i', $whereIN)) {
        return $arr[0];
    }
    if ($arr = preg_grep ('/^ddr3/i', $whereIN)) {
        return $arr[0];
    }
    if ($arr = preg_grep ('/^ddr2/i', $whereIN)) {
        return $arr[0];
    }
    return false;
  }
}


function infoConfig(){
  $whereIN = [];
  // recherche d'une carte mère pour savoir
  // quel processeur est compatible
  // avec le socket de la carte mere
  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;

  $CreationConception = new CreationConception();
  $componentMainBoard = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 9]// categorie 9 =  carte mere
  ])->get();

  // si on a récupéré une carte mère dans la config actuelle
  if($componentMainBoard !== false){
    // on peut recuprer son id pour le réutiliser pour obtenir ses tags
    $idMainBoard = $componentMainBoard->id_composant;

    $Tag = new Tag();
    $tags = $Tag->select([
      ['id_composant', '=', $idMainBoard]
    ])->gets();
    foreach ($tags as $tag) {
      $whereIN[]= $tag->tag; // on recupere les tags de la carte mere
    }
  }

  return $whereIN;
}

function getTags($idComponent){
  $Tag = new Tag();
  $componentsArray = $Tag->select([
    ['id_composant', '=', $idComponent]
  ])->gets();

  foreach ($componentsArray as $componentStruct) {
    $whereIN[]= $componentStruct->tag; // on recupere les tags du composant
  }
  return $whereIN;
}

function getTag($tagName){
  if ($arr = preg_grep ('/^'.$tagName.'$/i', getTags($_POST['id']))) {
      return $arr[0];
  }
  return false;
}


?>
