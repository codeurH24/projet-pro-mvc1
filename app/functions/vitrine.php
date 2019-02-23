<?php

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
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return false;
  }
  $ID_creationEnable = $creationEnable->id;
  return $ID_creationEnable;
}

function infoConfig_numberOfRAM(){
  // recherche des composant deja ajouter a la config
  // en particulier les composant de RAM
  $Creation = new Creation();
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return false;
  }
  $ID_creationEnable = $creationEnable->id;

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
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return false;
  }
  $ID_creationEnable = $creationEnable->id;

  $CreationConception = new CreationConception();
  $componentsProcessor = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 8]// categorie 8  =  processeur
  ])->gets();

  // retourne les resultats en comptant les lignes de resultat
  if( $componentsProcessor !== false && !empty($componentsProcessor)){
    return count($componentsProcessor);
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
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return false;
  }
  $ID_creationEnable = $creationEnable->id;

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
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return false;
  }
  $ID_creationEnable = $creationEnable->id;

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
  return false;
}


function infoConfig(){
  $whereIN = [];
  // recherche d'une carte mère pour savoir
  // quel processeur est compatible
  // avec le socket de la carte mere
  $Creation = new Creation();
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return [];
  }
  $ID_creationEnable = $creationEnable->id;

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

function getTagsProcesseur(){
  $Creation = new Creation();
  $creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get();

  if($creationEnable === false ){
    return [];
  }
  $ID_creationEnable = $creationEnable->id;

  $CreationConception = new CreationConception();
  $componentProcesseur = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $ID_creationEnable],
    ['composant.id_cat', '=', 8]// categorie 8  =  processeur
  ])->get();

  $Tag = new Tag();
  $componentsArray = $Tag->select([
    ['id_composant', '=', $componentProcesseur->id_composant]
  ])->gets();

  foreach ($componentsArray as $componentStruct) {
    $whereIN[]= $componentStruct->tag; // on recupere les tags du composant
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
