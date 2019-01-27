<?php
require 'model/modelCreation.php';
require 'model/modelAccess.php';
require 'model/modelRole.php';


function index(){
  view('admin/access/indexAccess.view.php',[
    'title' => 'PC-CONFIG',
    'access' => getAccess()

  ]);
}

function show(){
  view('admin/access/showAccess.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}

function create(){
  view('admin/access/createAccess.view.php',[
    'title' => 'PC-CONFIG',
    'roles' => getRoles()
  ]);
}

function store(){
  if( !empty($_POST['url']) && !empty($_POST['id_role']) ){
    if(createAccess($_POST['url'], $_POST['id_role'], 0) === false){
      exit('Erreur SQL');
    }
    header('Location: /admin/acces/');
  }else{
    exit('Un des champs est vide');
  }
}


function edit(){
  view('admin/access/updateAccess.view.php',[
    'title' => 'PC-CONFIG',
    'access' => getAccessByID($_GET['id']),
    'roles' => getRoles()
  ]);
}
function update(){
  if( !empty($_POST['url']) && !empty($_POST['id_role']) ){
    if(updateAccess($_POST['id'], $_POST['url'], $_POST['id_role'], 0) === false){
      exit('Erreur SQL');
    }
    header('Location: /admin/acces/');
  }else{
    exit('Un des champs est vide');
  }
}

function editRequest(){
  view('admin/access/deleteAccess.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}
function delete(){

}
 ?>
