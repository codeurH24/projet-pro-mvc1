<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
require 'model/modelImageComposant.php';
require 'model/modelCategory.php';
function index(){
  view('admin/component/indexComponent.view.php',[
    'title' => 'PC-CONFIG',
    'components' => getComponents()
  ]);
}
function create(){
  view('admin/component/createComponent.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}
function store(){
  createComponent($_POST['model'], $_POST['marque'], $_POST['score'], $_POST['categorie']);
  header('Location: /admin/composant/');
  exit('store component');
}

function delete(){
  deleteComponent($_GET['id']);
  header('Location: /admin/composant/');
}

function edit(){
  view('admin/component/editComponent.view.php',[
    'title' => 'PC-CONFIG',
    'component' => getComponent($_GET['id']),
    'imageComponent' => getImageComposant($_GET['id']),
    'categories' => getCategories()
  ]);
}

function update(){
  updateComponent($_POST['id'], $_POST['model'], $_POST['marque'], $_POST['pointPuissance'], $_POST['categorie']);
  header('Location: /admin/composant/modifier-composant-'.$_POST['id'].'.php');
}

?>
