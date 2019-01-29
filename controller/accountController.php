<?php
require 'model/modelUser.php';
require 'model/modelCreation.php';
function login(){
  view('account/login.view.php',[
    'title' => 'PC-CONFIG',
    'class' => 'pageBackgroundLogin'
  ]);
}
function submitLogin(){
  $user = getUser($_POST['mail'], md5($_POST['password']));
  if ($user !== false){
    $_SESSION['user'] = [
      'id' =>  $user->id,
      'pseudo' => $user->pseudo,
      'roleID' => $user->id_role
    ];
    header('Location: /');
    exit('User trouvé');
  }else{
    header('Location: /mon-compte/connexion/');
    exit('Aucun user');
  }
}
function registration(){
  $title = 'Projet MVC';
  view('account/registration.view.php',[
    'title' => 'PC-CONFIG',
    'class' => 'pageBackgroundRegistration'
  ]);
}
function logout(){
  $_SESSION['user'] = [];
  unset($_SESSION['user']);
  header('Location: /');
}
function myAccount(){
  $title = 'Projet MVC';

$componentList = getComponentOfCreationUser();


  view('account/myAccount.view.php',[
    'title' => 'PC-CONFIG',
    'creationList' => getCreationUser()
  ]);
}
function changePassword(){
  view('account/changePassword/indexChangePassword.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}
function updatePassword(){

  $currentPassword = getPasswordUser();
  $_SESSION['formErrors'] = [];

  if (empty($_POST['currentPassword'])) {
    $_SESSION['formErrors']['currentPassword'][] = 'Mot de passe vide, champ obligatoire';
  }

  if( empty($_POST['password1']) ){
    $_SESSION['formErrors']['password1'][] = 'Mot de passe vide, champ obligatoire';
  }

  if( empty($_POST['password2']) ){
    $_SESSION['formErrors']['password2'][] = 'Mot de passe vide, champ obligatoire';
  }

  if( $_POST['password1'] != $_POST['password2']){
    $_SESSION['formErrors']['password1'][] = 'Les mots de passe ne sont pas identiques';
    $_SESSION['formErrors']['password2'][] = 'Les mots de passe ne sont pas identiques';
  }
  if (empty($_SESSION['formErrors']) && $currentPassword == md5($_POST['currentPassword'])) {
    changePasswordUser($_POST['password1']);
    header('Location: /mon-compte/logout/');
  }else{
    header('Location: /mon-compte/changer-mon-mot-de-passe/');
  }

}
?>
