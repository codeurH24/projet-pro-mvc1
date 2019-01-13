<?php
require 'model/modelCreation.php';
require 'model/modelReseller.php';
function index(){
  view('admin/reseller/indexReseller.view.php',[
    'title' => 'PC-CONFIG',
    'resellers' => getResellers()
  ]);
}
function create(){
  view('admin/reseller/createReseller.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}
function store(){
  createReseller($_POST['name']);
  header('Location: /admin/revendeur/');
}

function edit(){
  view('admin/reseller/updateReseller.view.php',[
    'title' => 'PC-CONFIG',
    'reseller' => getReseller($_GET['id'])
  ]);
}
function update(){
  updateReseller($_POST['id'], $_POST['name']);
  header('Location: /admin/revendeur/');
}
function delete(){
  deleteReseller($_GET['id']);
  header('Location: /admin/revendeur/');
}

 ?>
