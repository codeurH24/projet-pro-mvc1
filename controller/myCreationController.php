<?php
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelOS.php';

function createMyCreation(){
  $OS = new OS();
  $os = $OS->getOS()->gets();

  view('account/myCreation/createMyCreation.view.php',[
    'os' => $os
  ]);
}
function storeMyCreation(){

  require 'resquest/form/rule/account/myCreation/createRules.php';

  // si il y a aucune erreurs alors '0' alors 'faux' alors on 'entre pas' dans la condition.
  if (count(errorsForm())) {
    view('account/myCreation/createMyCreation.view.php');
    exit;
  }

  $Creation = new Creation();
  $Creation->setName($_POST['name']);
  $Creation->setEnable(0);
  $Creation->setDescription($_POST['description']);
  $Creation->setIdOs($_POST['idOs']);
  $Creation->setIdUser(UID());
  $Creation->setDateCreation(dbDate());
  $isSuccess = $Creation->createCreation();


  header('Location: /mes-creations/');
}

function showMyCreation(){
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  // recupere le nom de la config detaillé en cours de visionnage
  $Creation = new Creation();
  $creation = $Creation->getCreation([
    ['creation.id', '=', $_GET['id']],
    ['creation.id_user', '=', UID()]
  ])->get();

  // aucune page visible si l'utilisateur n'est pas le bon
  if( $creation === false){
    view('errors/404.view.php');
    exit;
  }

  // recupere les composants qui appartiennent à la config detaillé en cours de visionnage
  $CreationConception = new CreationConception();
  $components = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $_GET['id']]
  ])->gets();


  view('account/myCreation/showMyCreation.view.php',[
    'componentsList' => $components,
    'titreCreation' => $creation->name
  ]);
}


function editMyCreation(){
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  $OS = new OS();
  $os = $OS->getOS()->gets();

  view('account/myCreation/updateCreation.view.php',[
    'creation' => getCreationByID($_GET['id']),
    'os' => $os
  ]);
}

function updateMyCreation(){
  if( getCreationByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  // met à jour la config
  $Creation = new Creation();
  $Creation->setName($_POST['name']);
  $Creation->setDescription($_POST['description']);
  $Creation->setIdOs($_POST['idOs']);
  $isSuccess = $Creation->updateCreation([
    ['id', '=', $_POST['id']]
  ]);

  header('Location: /mes-creations/modifier-une-creation-'.$_POST['id'].'.php');
}

function deleteMyCreation(){
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  $Creation = new Creation();
  $isSuccess = $Creation->deleteCreation([
    ['id', '=', $_GET['id']]
  ]);

  header('Location: /mes-creations/');
}


function deleteItemCreation(){
  if (isset($_POST['deleteItemCreation'])) {

    $CreationConception = new CreationConception();
    $isSuccess = $CreationConception->deleteCreationConception([
      ['id', '=', $_POST['idItem']]
    ]);
    header('Location: /mes-creations/detail/'.$_POST['idCreation'].'.php');
    exit('deleteItemCreation(): Item de la création supprimer');
  }
}

function enableMyCreation(){
  if(!UID()){
    exit('Utilisateur non connecté');
  }

  // recupere l'id pour verifier
  // qu'on n'active pas la meme creation
  // $creationEnable = whoIsEnableInMyCreation();

  $Creation = new Creation();
  $ID_creationEnable = $Creation->getCreation([
    ['enable', '=', 1],
    ['id_user', '=', UID()]
  ])->get()->id;


  if ($_GET['id'] == $ID_creationEnable) {
    header('Location: /mes-creations/');
    exit;
  }
  // ici l'id demandé n'est pas le meme que celui deja activé
  // alors on désactive la creation deja activé
  // enableCreation($creationEnable,0);


  // Desactive toutes les configs
  $Creation = new Creation();
  $Creation->setEnable(0);
  $isSuccess = $Creation->updateCreation([
    ['id_user', '=', UID()]
  ]);

  // et ont active la creation demander
  // par inversement de l'etat
  $etat = enableCreation($_GET['id']);
  $etat = !$etat;

  // active la config souhaité
  $Creation = new Creation();
  $Creation->setEnable((int)$etat);
  $isSuccess = $Creation->updateCreation([
    ['id', '=', $_GET['id']],
    ['id_user', '=', UID()]
  ]);

  // enableCreation($_GET['id'],(int)$etat);
  header('Location: /mes-creations/');
}

 ?>
