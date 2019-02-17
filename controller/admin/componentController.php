<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
require 'model/modelImageComposant.php';
require 'model/modelCategory.php';
require 'model/modelTagComponent.php';

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


function show(){
  if(getComponent($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }

  $Tag = new Tag();
  $tags = $Tag->select([
    ['id_composant', '=', $_GET['id']]
  ])->gets();




  view('admin/component/show/showComponent.view.php',[
    'tags' => $tags,
    'component' => getComponent($_GET['id']),
    'imageComponent' => getImageComposant($_GET['id']),
    'categories' => getCategories()
  ]);
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

function delete(){
  if(getComponent($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  deleteComponent($_GET['id']);
  header('Location: /admin/composant/');
}
?>
