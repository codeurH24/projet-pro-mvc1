<?php
require 'model/modelCreation.php';
require 'model/modelComponent.php';
require 'model/modelCompatibility.php';

function index(){
// print_r(getCompatibilities());
//   exit;
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
  createCompatibility($_SESSION['user']['pseudo'], $_POST['composant1'], $_POST['composant2']);
  header('Location: /admin/composant/compatibilite/');
}

function edit(){
  view('admin/compatibility/updateCompatibility.view.php',[
    'components' => getComponents()
  ]);
}
function update(){
  updateCompatibility($_POST['id'], $_SESSION['user']['pseudo'], $_POST['composant1'], $_POST['composant2']);
  header('Location: /admin/composant/compatibilite/');
}

function delete(){
  deleteCompatibility($_GET['id']);
  header('Location: /admin/composant/compatibilite/');
}
 ?>
