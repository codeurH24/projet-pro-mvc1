<?php
require 'model/modelUser.php';
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';

function login(){
  view('account/login.view.php',[
    'class' => 'pageBackgroundLogin'
  ]);
}
function submitLogin(){

  $User = new User();
  $user = $User->getUser([
    ['email', 'LIKE', $_POST['email']]
  ])->get();


  require 'resquest/form/rule/account/loginRules.php';



  if (  $user !== false && password_verify ( $_POST['password'].secretKey, $user->password ) ){
    $_SESSION['user'] = [
      'id' =>  $user->id,
      'pseudo' => $user->pseudo,
      'roleID' => $user->id_role
    ];
    header('Location: /');
    exit('User trouvé');
  }else{
    view('account/login.view.php',[
      'class' => 'pageBackgroundLogin'
    ]);
    exit;
  }
}
function registration(){
  view('account/registration.view.php',[
    'class' => 'pageBackgroundRegistration'
  ]);
}

function createRegistration(){

  $User = new User();

  $User->setPseudo($_POST['pseudo']);
  $User->setEmail($_POST['email']);
  $User->setPassword(password_hash($_POST['password1'].secretKey, PASSWORD_BCRYPT));
  $User->setDateRegistration(dbDate());
  $User->setDateLastLogin(dbDate());
  $User->setIdRole(1);

  $isSuccess = $User->createUser();
  if ($isSuccess) {
    $_SESSION['message']['success'] = 'L\'utilisateur a bien été crée';
  }

  header('Location: /mon-compte/inscription/');
}




function logout(){
  $_SESSION['user'] = [];
  unset($_SESSION['user']);
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  session_destroy();
  header('Location: /');
}
function myAccount(){

  $Creation = new Creation();
  $creationList = $Creation->getCreation([
    ['id_user', '=', UID()]
  ])->gets();

  view('account/myAccount.view.php',[
    'creationList' => $creationList
  ]);
}
function changePassword(){
  view('account/changePassword/indexChangePassword.view.php');
}
function updatePassword(){

  $User = new User();
  $user = $User->getUser([
    ['id', '=', UID()]
  ])->get();

  $currentPassword = $user->password;
  require 'resquest/form/rule/account/changePassword/changePasswordRules.php';

  if (empty($_SESSION['formErrors']) && password_verify ( $_POST['currentPassword'].secretKey , $currentPassword ) ) {

    $User = new User();
    $newPassword = password_hash ( $_POST['password1'].secretKey , PASSWORD_BCRYPT ) ;
    $User->setPassword($newPassword);
    $isSucess = $User->updateUser([
      ['id', '=', UID()]
    ]);

    header('Location: /mon-compte/logout/');
    exit;
  }else{
    header('Location: /mon-compte/changer-mon-mot-de-passe/');
    exit;
  }

}
?>
