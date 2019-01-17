<?php
require 'model/modelCreation.php';
require 'model/modelUser.php';
require 'model/modelRole.php';

function index(){

  view('admin/user/indexUser.view.php',[
    'title' => 'PC-CONFIG',
    'users' => getUsers()
  ]);
}
function create(){
  view('admin/user/createUser.view.php',[
    'title' => 'PC-CONFIG',
    'roles' => getRoles()
  ]);
}
function store(){
    createUser(
      $_POST['lastname'],
      $_POST['firstname'],
      $_POST['pseudo'],
      $_POST['email'],
      $_POST['age'],
      $_POST['password1'],
      dbDate(),
      dbDate(),
      $_POST['id_role']
    );
    header('Location: /admin/utilisateurs/');
}
 ?>
