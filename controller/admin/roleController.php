<?php
require 'model/modelCreation.php';
require 'model/modelRole.php';

function index(){
  view('admin/role/indexRole.view.php',[
    'title' => 'PC-CONFIG',
    'roles' => getRoles()
  ]);
}

function show(){
  view('admin/role/showRole.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}

function create(){
  view('admin/role/createRole.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}

function store(){
  if(isset($_POST['name'])){
    if( createRole($_POST['name']) === false){
      exit('SQL Erreur');
    }
  }
  header('Location: /admin/roles/');
}

function edit(){
  view('admin/role/updateRole.view.php',[
    'title' => 'PC-CONFIG',
    'role' => getRoleByID($_GET['id'])
  ]);
}
function update(){
  if(isset($_POST['id']) && isset($_POST['name'])){
    updateRole($_POST['id'], $_POST['name']);
  }
  header('Location: /admin/roles/');
}

function deleteRequest(){
  view('admin/role/deleteRole.view.php',[
    'title' => 'PC-CONFIG',
    'role' => getRoleByID($_GET['id'])
  ]);
}

function delete(){
  if(isset($_POST['id'])){
    deleteRole($_POST['id']);
  }
  header('Location: /admin/roles/');
}


 ?>
