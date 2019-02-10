<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
require 'model/modelImageComposant.php';
require 'model/modelCategory.php';
function index(){
  view('admin/component/indexComponent.view.php',[
    'components' => getComponents()
  ]);
}
function create(){
  view('admin/component/createComponent.view.php');
}
function store(){
  createComponent($_POST['model'], $_POST['marque'], $_POST['score'], $_POST['categorie']);
  header('Location: /admin/composant/');
  exit('store component');
}

function delete(){
  if(getComponent($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  deleteComponent($_GET['id']);
  header('Location: /admin/composant/');
}

function edit(){
  if(getComponent($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/component/editComponent.view.php',[
    'component' => getComponent($_GET['id']),
    'imageComponent' => getImageComposant($_GET['id']),
    'categories' => getCategories()
  ]);
}

function update(){
  if(getComponent($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  updateComponent($_POST['id'], $_POST['model'], $_POST['marque'], $_POST['pointPuissance'], $_POST['categorie']);
  header('Location: /admin/composant/modifier-composant-'.$_POST['id'].'.php');
}

?>
