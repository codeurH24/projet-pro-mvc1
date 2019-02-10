<?php
require 'model/modelCreation.php';
require 'model/modelRole.php';

function index(){
  view('admin/role/indexRole.view.php',[
    'roles' => getRoles()
  ]);
}

function show(){

  view('admin/role/showRole.view.php');
}

function create(){
  view('admin/role/createRole.view.php');
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
  if(getRoleByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/role/updateRole.view.php',[
    'role' => getRoleByID($_GET['id'])
  ]);
}
function update(){
  if(getRoleByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  if(isset($_POST['id']) && isset($_POST['name'])){
    updateRole($_POST['id'], $_POST['name']);
  }
  header('Location: /admin/roles/');
}

function deleteRequest(){
  if(getRoleByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/role/deleteRole.view.php',[
    'role' => getRoleByID($_GET['id'])
  ]);
}

function delete(){
  if(getRoleByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  if(isset($_POST['id'])){
    deleteRole($_POST['id']);
  }
  header('Location: /admin/roles/');
}


 ?>
