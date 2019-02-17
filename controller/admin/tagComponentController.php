<?php
require 'model/modelCreation.php';
require 'model/modelComponent.php';
require 'model/modelTagComponent.php';
function index(){



  if( isset($_POST['tagsComposant']) and !empty($_POST['tagWord']) and !empty($_SESSION['sqlTagComponentCreate'])  ){
    $queryTag = str_replace("%%tag%%", $_POST['tagWord'], $_SESSION['sqlTagComponentCreate']);

    if (createTagsComponent($queryTag)) {
      echo 'Requete de création de tag reussi<br />';
      $_SESSION['sqlTagComponentCreate'] = [];
    }else{
      echo 'ECHEC: Requete de création de tag<br />';
    }
  }

  if ( isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and empty($_POST['keyWord']) ) {

    // $query = "SELECT * FROM `composant` ";
    // $listOfComponent = bddQuery($mysqli, $query);
    $listOfComponent = getComponents();

  }else if (isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and !empty($_POST['keyWord']) ) {

    // $query = 'SELECT * FROM `composant` WHERE `model` LIKE \'%'.$_POST['keyWord'].'%\' ';
    // $listOfComponent = bddQuery($mysqli, $query);
    $listOfComponent = getComponentsLike($_POST['keyWord']);
    $_SESSION['sqlTagComponentCreate'] = [];

  }else{
    $listOfComponent = [];
  }

  view('admin/tagComponent/indexTagComponent.view.php',[
    'listOfComponent' => $listOfComponent
  ]);
}

function create(){
  view('admin/tagComponent/createTag.view.php');
}
function store(){
  $Tag = new Tag();
  $Tag->setIdComposant($_POST['id']);
  $Tag->setTag($_POST['name']);
  $isSuccess = $Tag->createTag();

  if($isSuccess === false){
    exit('probleme pour creer le tag');
  }else{
    header("Location: /admin/composant/montrer-composant-$_POST[id].php");
    exit('Tag creer avec succès');
  }
}
function edit(){
  $Tag = new Tag();
  $tag = $Tag->select([
    ['id', '=', $_GET['id']]
  ])->get();
  view('admin/tagComponent/updateTag.view.php',[
    'tag' => $tag
  ]);
}
function update(){
  $Tag = new Tag();
  $Tag->setTag($_POST['name']);
  $isSuccess = $Tag->updateTag([
    ['id', '=', $_POST['id']]
  ]);

  if($isSuccess === false){
    exit('probleme pour mettre à jour le tag');
  }else{
    $Tag = new Tag();
    $tag = $Tag->select([
      ['id', '=', $_POST['id']]
    ])->get();
    header("Location: /admin/composant/montrer-composant-$tag->id_composant.php");
    exit('Tag mis à jour avec succès');
  }
}
function deleteRequest(){
  $Tag = new Tag();
  $tag = $Tag->select([
    ['id', '=', $_GET['id']]
  ])->get();
  view('admin/tagComponent/deleteTag.view.php',[
    'tag' => $tag
  ]);
}
function delete(){

  // recupere l'id du composant a qui appartient le tag
  // pour pouvoir le rediriger la page du composant
  $Tag = new Tag();
  $tag = $Tag->select([
    ['id', '=', $_POST['id']]
  ])->get();
  $idComponent = $tag->id_composant;


  $Tag = new Tag();
  $isSuccess = $Tag->deleteTag([
    ['id', '=', $_POST['id']]
  ]);

  if($isSuccess === false){
    exit('probleme pour supprimer le tag');
  }else{
    header("Location: /admin/composant/montrer-composant-$idComponent.php");
    exit('Tag supprimer avec succès');
  }
}
 ?>
