<?php
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelOS.php';

// contrôleur pour gérer la page de création de configuration
function createMyCreation(){
  // récupère tous les systèmes d'exploitations
  // pour les mettre dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();
  // affiche la vue et en paramètre les systèmes d'exploitations
  view('account/myCreation/createMyCreation.view.php',[
    'os' => $os
  ]);
}
// contrôleur pour traiter le formulaire de création de configurations
function storeMyCreation(){
  // cette action n'est pas autorisée si par erreur
  // un autre utilisateur du site force cette action
  if ($_POST['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
  // contrôle les données du formulaire saisies par l'utilisateur
  require 'resquest/form/rule/account/myCreation/createRules.php';

  // s'il n'y a aucune erreur alors '0' alors 'faux' alors on 'entre pas'
  // dans la condition.
  if (count(errorsForm())) {
    // maintenant qu'il y a une ou plusieurs erreurs
    // on récupère tous les systèmes d'exploitations
    $OS = new OS();
    $os = $OS->getOS()->gets();
    // on transmet tous les systèmes à la vue
    view('account/myCreation/createMyCreation.view.php',[
      'os' => $os
    ]);
    exit;
  }
  // a partir d'ici il n'y a pas d'erreur avec le formulaire
  // envoyé par l'utilisateur
  //
  // Enregistrement des données saisies par l'utilisateurs
  // dans la base de données
  $Creation = new Creation();
  $Creation->setName($_POST['name']);
  $Creation->setEnable(0);
  $Creation->setDescription($_POST['description']);
  $Creation->setIdOs($_POST['idOs']);
  $Creation->setIdUser(UID());
  $Creation->setDateCreation(dbDate());
  // Exécution de l'enregistrement de la création par l'utilisateur
  $isSuccess = $Creation->createCreation();

  // s'il y a une erreur pour enregistrer alors on stoppe bêtement
  // le script php
  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de modification de configuration est survenue';
    header('Location: /mes-creations/update.php');
    exit('Une erreur de création de configuration est survenue');
  }
  // si tout s'est bien effectué alors on redirige vers les configurations
  // de l'utilisateur
  header('Location: /mes-creations/');
}

// contrôleur qui affiche le détail de la configuration
function showMyCreation(){
  // si la création demandée n'existe pas alors on affiche
  // une jolie page d'erreur 404 personnalisée
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  // récupère le nom de la configuration détaillée en cours de consultation
  $Creation = new Creation();
  $creation = $Creation->getCreation([
    ['creation.id', '=', $_GET['id']],
    ['creation.id_user', '=', UID()]
  ])->get();

  // s'il y a un problème dans la requête ou si par exemple
  // l'utilisateur n'est pas le bon alors on affiche
  // une jolie page d'erreur 404 personnalisée
  if( $creation === false){
    view('errors/404.view.php');
    exit;
  }

  // récupère les composants qui appartiennent à
  // la configuration détaillée en cours de consultation
  $CreationConception = new CreationConception();
  $components = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $_GET['id']]
  ])->gets();

  // affiche la vue détaillée de la configuration
  view('account/myCreation/showMyCreation.view.php',[
    'componentsList' => $components,
    'titreCreation' => $creation->name
  ]);
}

// contrôleur qui affiche le formulaire pour permettre de modifier
// une création
function editMyCreation(){
  // si la création demandée n'existe pas alors on affiche
  // une jolie page d'erreur 404 personnalisée
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }

  // récupère tous les systèmes d'exploitation
  // pour les mettre dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();

  // affichage de la vue avec les différentes variables appelées
  // dans celle ci.
  view('account/myCreation/updateCreation.view.php',[
    'creation' => getCreationByID($_GET['id']),
    'os' => $os
  ]);
}
// contrôleur pour traiter le formulaire de modification de création
function updateMyCreation(){
  // cette action n'est pas autorisée si par erreur
  // un autre utilisateur du site force cette action
  if ($_POST['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
  // si la création demandée n'existe pas alors on affiche
  // une jolie page d'erreur 404 personnalisée
  if( getCreationByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }


  // contrôle les données du formulaire saisies par l'utilisateur
  require 'resquest/form/rule/account/myCreation/updateRules.php';

  // récupère tous les systèmes d'exploitation
  // pour les mettre dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();


  // s'il y a aucune erreur alors '0' alors 'faux'
  // alors on 'entre pas' dans la condition.
  if (count(errorsForm())) {
    view('account/myCreation/updateCreation.view.php',[
      'creation' => getCreationByID($_POST['id']),
      'os' => $os
    ]);
    exit;
  }

  // met à jour la configuration
  $Creation = new Creation();
  $Creation->setName($_POST['name']);
  $Creation->setDescription($_POST['description']);
  $Creation->setIdOs($_POST['idOs']);
  $isSuccess = $Creation->updateCreation([
    ['id', '=', $_POST['id']]
  ]);

  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de modification de configuration est survenue';
    header('Location: /mes-creations/update.php');
    exit('Une erreur de modification de configuration est survenue');
  }

  header('Location: /mes-creations/modifier-une-creation-'.$_POST['id'].'.php');
}
// contrôleur de demande de suppression de configurations
function deleteRequestMyCreation(){
  view('account\myCreation\deleteMyCreation.php',[
    'id' => $_GET['id']
  ]);
}

// contrôleur de suppression de configurations
function deleteMyCreation(){
  // cette action n'est pas autorisée si par erreur
  // un autre utilisateur du site force cette action
  if ($_GET['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
  // si la création demandée n'existe pas alors on affiche
  // une jolie page d'erreur 404 personnalisée
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }

  // Supprime la creation grâce a son identifiant
  $Creation = new Creation();
  $isSuccess = $Creation->deleteCreation([
    ['id', '=', $_GET['id']]
  ]);

  // s'il y a une erreur pour enregistrer alors on stoppe bêtement
  // le script php
  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de suppression de configuration est survenue';
    header('Location: /mes-creations/');
    exit('Une erreur de suppression de configuration est survenue');
  }

  $isSuccess = $CreationConception = new CreationConception();
  $CreationConception->deleteCreationConception([
    ['id', '=', $_GET['id']]
  ]);

  // s'il y a une erreur pour enregistrer alors on stoppe bêtement
  // le script php
  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de suppression de configuration est survenue';
    header('Location: /mes-creations/');
    exit('Une erreur de suppression de configuration est survenue');
  }

  // si tout s'est bien effectué alors on redirige vers les configurations
  // de l'utilisateur
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

  // récupère l'id pour vérifier
  // qu'on n'active pas la même création
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
  // ici l'id demandé n'est pas le même que celui deja activé
  // alors on désactive la création déjà activée
  // enableCreation($creationEnable,0);


  // Désactive toutes les configurations
  $Creation = new Creation();
  $Creation->setEnable(0);
  $isSuccess = $Creation->updateCreation([
    ['id_user', '=', UID()]
  ]);

  // et on active la création demandée
  // par inversement de l'état
  $etat = enableCreation($_GET['id']);
  $etat = !$etat;

  // active la configuration souhaitée
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
