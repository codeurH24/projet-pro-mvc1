<?php
require 'model/modelCreation.php';
require 'model/modelComponent.php';
require 'model/modelCompatibility.php';

function index(){
  view('admin/compatibility/indexCompatibility.view.php',[
    'compatibilities' => getCompatibilities()
  ]);
}
function create(){
  view('admin/compatibility/createCompatibility.view.php',[
    'components' => getComponents()
  ]);
}
function store(){
  createCompatibility($_SESSION['user']['pseudo'], $_POST['component1'], $_POST['component2']);
  header('Location: /admin/composant/compatibilite/');
}

function edit(){
  if((bool)getCompatibilitie($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/compatibility/updateCompatibility.view.php',[
    'components' => getComponents()
  ]);
}
function update(){
  if((bool)getCompatibilitie($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  updateCompatibility($_POST['id'], $_SESSION['user']['pseudo'], $_POST['component1'], $_POST['component2']);
  header('Location: /admin/composant/compatibilite/');
}

function delete(){
  if((bool)getCompatibilitie($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  deleteCompatibility($_GET['id']);
  header('Location: /admin/composant/compatibilite/');
}
 ?>
