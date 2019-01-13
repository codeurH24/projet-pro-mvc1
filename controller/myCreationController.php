<?php
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';

function createMyCreation(){
  view('account/myCreation/createMyCreation.view.php',[
    'title' => 'Projet MVC'
  ]);
}
function storeMyCreation(){
  createCreation($_POST['name'], 0, $_POST['description'], UID(), dbDate());
  header('Location: /mes-creations/');
}

function showMyCreation(){
  $creation = getCreationByID($_GET['id']);

  view('account/myCreation/showMyCreation.view.php',[
    'title' => 'Projet MVC',
    'componentsList' => getComponentOfCreationUser($_GET['id']),
    'titreCreation' => $creation->name
  ]);
}


function editMyCreation(){

  view('account/myCreation/updateCreation.view.php',[
    'title' => 'Projet MVC',
    'creation' => getCreationByID($_GET['id'])
  ]);
}

function updateMyCreation(){
  updateCreation($_POST['id'], $_POST['name'], $_POST['description']);
  header('Location: /mes-creations/modifier-une-creation-'.$_POST['id'].'.php');
}

function deleteMyCreation(){
    deleteCreation($_GET['id']);
    header('Location: /mes-creations/');
}


function deleteItemCreation(){
  if (isset($_POST['deleteItemCreation'])) {
    creationConceptionDelete($_POST['idItem']);
    header('Location: /mes-creations/detail/'.$_POST['idCreation'].'.php');
    exit('deleteItemCreation(): Item de la création supprimer');
  }
}

function enableMyCreation(){

  // recupere l'id pour verifier
  // qu'on n'active pas la meme creation
  $creationEnable = whoIsEnableInMyCreation();
  if ($_GET['id'] == $creationEnable) {
    header('Location: /mes-creations/');
    exit;
  }
  // ici l'id demander n'est pas le meme que celui deja activé
  // alors on désactive la creation deja activé
  enableCreation($creationEnable,0);

  // et ont active la creation demander
  // par inversement de l'etat
  $etat = enableCreation($_GET['id']);
  $etat = !$etat;
  enableCreation($_GET['id'],(int)$etat);
  header('Location: /mes-creations/');
}

 ?>
