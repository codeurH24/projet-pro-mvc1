<?php
require 'model/modelCreation.php';
require 'model/modelReseller.php';
function index(){
  view('admin/reseller/indexReseller.view.php',[
    'resellers' => getResellers()
  ]);
}
function create(){
  view('admin/reseller/createReseller.view.php');
}
function store(){
  createReseller($_POST['name']);
  header('Location: /admin/revendeur/');
}

function edit(){
  if((bool)getReseller($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/reseller/updateReseller.view.php',[
    'reseller' => getReseller($_GET['id'])
  ]);
}
function update(){
  if((bool)getReseller($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  updateReseller($_POST['id'], $_POST['name']);
  header('Location: /admin/revendeur/');
}
function delete(){
  if((bool)getReseller($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  deleteReseller($_GET['id']);
  header('Location: /admin/revendeur/');
}

 ?>
