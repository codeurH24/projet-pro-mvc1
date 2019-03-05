<?php
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelOS.php';

// controlleur pour gerer la page de création de configuration
function createMyCreation(){
  // recupere tout les systemes d'exploitations
  // pour les mettre dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();
  // affiche la vue et en paramètres les systemes d'exploitations
  view('account/myCreation/createMyCreation.view.php',[
    'os' => $os
  ]);
}
// controlleur pour traiter le formulaire de création de configurations
function storeMyCreation(){
  // cette action n'est pas autorisé si par erreur
  // un autre utilisateur du site force cette action
  if ($_POST['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
  // controle les données du formulaire saisie par l'utilisateur
  require 'resquest/form/rule/account/myCreation/createRules.php';

  // si il y a aucune erreurs alors '0' alors 'faux' alors on 'entre pas' dans la condition.
  if (count(errorsForm())) {
    // maintenant qu'il y a une ou plusieurs erreurs
    // ont recuperer tout les systemes d'exploitations
    $OS = new OS();
    $os = $OS->getOS()->gets();
    // ont transmet tout les systemes à la vue
    view('account/myCreation/createMyCreation.view.php',[
      'os' => $os
    ]);
    exit;
  }
  // a partir d'ici il n'y a pas d'erreurs avec le formulaire
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
  // Execution de l'enregistrement de la création par l'utilisateur
  $isSuccess = $Creation->createCreation();

  // si il y a une erreur pour enregistrer alors ont stop bètement le script php
  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de modification de configuration est survenue';
    header('Location: /mes-creations/update.php');
    exit('Une erreur de création de configuration est survenue');
  }
  // si tout c'est bien effectué alors ont redirige vers les configurations
  // de l'utilisateur
  header('Location: /mes-creations/');
}

// controlleur qui affiche le détail de la configuration
function showMyCreation(){
  // si la création demandé n'existe pas alors ont affiche
  // une jolie page d'erreur 404 personnalisé
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  // recupere le nom de la config detaillé en cours de consultation
  $Creation = new Creation();
  $creation = $Creation->getCreation([
    ['creation.id', '=', $_GET['id']],
    ['creation.id_user', '=', UID()]
  ])->get();

  // si il y a un probleme dans la requete ou si par exemple
  // l'utilisateur n'est pas le bon alors ont affiche
  // une jolie page d'erreur 404 personnalisé
  if( $creation === false){
    view('errors/404.view.php');
    exit;
  }

  // recupere les composants qui appartiennent à
  // la configuration detaillé en cours de consultation
  $CreationConception = new CreationConception();
  $components = $CreationConception->getCreationConception([
    ['creation_conception.id_creation', '=', $_GET['id']]
  ])->gets();

  // affiche la vue detaillé de la configuration
  view('account/myCreation/showMyCreation.view.php',[
    'componentsList' => $components,
    'titreCreation' => $creation->name
  ]);
}

// controlleur qui affiche le formulaire pour permettre de modifier
// une création
function editMyCreation(){
  // si la création demandé n'existe pas alors ont affiche
  // une jolie page d'erreur 404 personnalisé
  if( getCreationByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }

  // recupere tout les systemes d'exploitations
  // pour les mettres dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();

  // affichage de la vue avec les differentes variablse appelées
  // dans celle ci.
  view('account/myCreation/updateCreation.view.php',[
    'creation' => getCreationByID($_GET['id']),
    'os' => $os
  ]);
}
// controlleur pour traiter le formulaire de modification de création
function updateMyCreation(){
  // cette action n'est pas autorisé si par erreur
  // un autre utilisateur du site force cette action
  if ($_POST['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
  // si la création demandé n'existe pas alors ont affiche
  // une jolie page d'erreur 404 personnalisé
  if( getCreationByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }


  // controle les données du formulaire saisie par l'utilisateur
  require 'resquest/form/rule/account/myCreation/updateRules.php';

  // recupere tout les systemes d'exploitations
  // pour les mettres dans la balise select de la vue
  $OS = new OS();
  $os = $OS->getOS()->gets();


  // si il y a aucune erreurs alors '0' alors 'faux' alors on 'entre pas' dans la condition.
  if (count(errorsForm())) {
    view('account/myCreation/updateCreation.view.php',[
      'creation' => getCreationByID($_POST['id']),
      'os' => $os
    ]);
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

  if($isSuccess === false){
    $_SESSION['notification'] = 'Une erreur de modification de configuration est survenue';
    header('Location: /mes-creations/update.php');
    exit('Une erreur de modification de configuration est survenue');
  }

  header('Location: /mes-creations/modifier-une-creation-'.$_POST['id'].'.php');
}

function deleteMyCreation(){

  if ($_GET['token'] != $_SESSION['user']['csrf']) {
    view('errors/404.view.php');
    exit;
  }
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
