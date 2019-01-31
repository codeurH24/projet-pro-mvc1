<?php
require 'model/modelUser.php';
require 'model/modelCreation.php';
function login(){
  view('account/login.view.php',[

    'class' => 'pageBackgroundLogin'
  ]);
}
function submitLogin(){
  $user = getUser($_POST['mail']);

  if ($user !== false && password_verify ( $_POST['password'].secretKey, $user->password ) ){
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
  view('account/registration.view.php',[
    'class' => 'pageBackgroundRegistration'
  ]);
}

function createRegistration(){

  require 'resquest/form/rule/account/registrationRules.php';

  if(count($errorsForm) > 0){
    view('account/registration.view.php',[
      'class' => 'pageBackgroundRegistration'
    ]);
    exit;
  }

  createUser(
    '',
    '',
    $_POST['pseudo'],
    $_POST['email'],
    0,
    password_hash($_POST['password1'].secretKey, PASSWORD_BCRYPT),
    dbDate(),
    dbDate(),
    1
  );

  header('Location: /mon-compte/inscription/');
}




function logout(){
  $_SESSION['user'] = [];
  unset($_SESSION['user']);
  header('Location: /');
}
function myAccount(){
  $componentList = getComponentOfCreationUser();
  view('account/myAccount.view.php',[
    'creationList' => getCreationUser()
  ]);
}
function changePassword(){
  view('account/changePassword/indexChangePassword.view.php');
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

  if (empty($_SESSION['formErrors']) && password_verify ( $_POST['currentPassword'].secretKey , $currentPassword ) ) {
    changePasswordUser($_POST['password1'].secretKey);
    header('Location: /mon-compte/logout/');
  }else{
    header('Location: /mon-compte/changer-mon-mot-de-passe/');
  }

}
?>
