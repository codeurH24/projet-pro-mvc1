<?php
require 'model/modelUser.php';
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelOS.php';

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
    header('Location: /mes-creations/');
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

  require 'resquest/form/rule/account/registrationRules.php';

  // vérifie que l'addresse email n'est pas déjà utilisé par un compte déjà existant
  if(getUser($_POST['email']) !== false){
    errorsForm('email', 'Adresse e-mail déjà utilisé');
  }
  // vérifie que le pseudonyme n'est pas déjà utilisé par un compte déjà existant
  $User = new User();
  $user = $User->getUser([
    ['pseudo', 'LIKE', $_POST['pseudo']]
  ])->get();
  if($user !== false){
    errorsForm('pseudo', 'Pseudonyme déjà pris');
  }
  // si il y a aucune erreurs alors '0' alors 'faux' alors on 'entre pas' dans la condition.
  if (count(errorsForm())) {
    view('account/registration.view.php',[
      'class' => 'pageBackgroundRegistration'
    ]);
    exit;
  }

  // si tout vas bien jusque ici ont peux enregistrer le nouvel utilisateur
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

function editEmail(){
  $User = new User();
  $user = $User->getUser([
    ['id', '=', UID()]
  ])->get();

  if(isset($user->email) && $user->email[-1] == ';'){
    view('account/email/sendEmailSuccess.view.php');
  }else{
    view('account/email/updateEmail.view.php');
  }

}

function confirmDeleteAccount() {
  view('account/deleteAccount/deleteAccount.view.php');
}

function deleteAccount() {
  $User = new User();
  $User->deleteUser([
    ['id', '=', UID()]
  ]);

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

  header('Location: /mon-compte/supprimer-mon-compte/logout/');
}

function deleteAccountLogout(){
  view('account/deleteAccount/deleteAccountSuccess.view.php');
}

function cancelUpdateEmail(){
  if (isset($_POST['cancelUpdateEmail'])) {
    $User = new User();
    $user = $User->getUser([
      ['id', '=', UID()]
    ])->get();

    $User = new User();
    $User->setEmail(trim($user->email, ';'));
    $User->updateUser([
      ['id', '=', $user->id]
    ]);
  }
  header('Location: /mon-compte/changer-mon-adresse-e-mail/');
}


function sendEmailSuccess(){
  view('account/email/sendEmailSuccess.view.php');
}
function emailValidateSuccessfully(){
  view('account/email/emailValidateSuccessfully.php');
}
function logoutUpdateEmail(){
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
  header('Location: /mon-compte/connexion/');
}

function updateEmail(){
  $email = base64_decode($_GET['emailBase64']);

  if( md5($email.$_GET['id'].secretKey) == $_GET['token']){

    $User = new User();
    $user = $User->getUser([
      ['id', '=', $_GET['id']]
    ])->get();

    if(isset($user->email) && $user->email[-1] == ';'){
      $User = new User();
      $User->setEmail($email);
      $User->updateUser([
        ['id', '=', $user->id]
      ]);
      header('Location: /change-email/emailValidateSuccessfully');
      exit('Adresse e-mail valider avec succé');
    }else{
      exit('Ce lien n\'est pas valide');
    }

  }
}

function confirmEmail(){
  // ajout du ; a la fin de l'email
  // envoi d'un email vers la nouvelle adresse email pour confirmer
  // L'utilisateur click sur le lien qui redirige vers une vue publique
  // si la nouvelle adresse corespond au token et que l'email encienne a un ;
  // alors on modifie l'email par le nouveau

  // vérifie si il a bien donné le bon mot de passe de son compte
  $User = new User();
  $user = $User->getUser([
    ['id', '=', UID()]
  ])->get();
  $currentPassword = $user->password;

  if ($user->email[-1] == ';') {
    exit('E-mail déjà en cours de validation');
  }

  if (!password_verify ( $_POST['currentPassword'].secretKey , $currentPassword )) {
    exit('Mauvais password');
  }
  if ($_POST['email1'] != $_POST['email2']) {
    exit('Les emails ne sont pas les mêmes');
  }


  $emailBase64 = base64_encode($_POST['email1']);
  $userID = UID();

  // creation du token pour empecher la modif de l'email dans l'url
  $tokenPatern = $_POST['email1'].$userID.secretKey;
  $tokenMD5 = md5($tokenPatern);

  // changement du mot de passe avec le ; pour statuer sur son état de confirmation
  $User = new User();
  $User->setEmail($user->email.';');
  $User->updateUser([
    ['id', '=', UID()]
  ]);

  // envoi de l'email de confirmation
  $headers = 'From: administrateur@pc-config.fr' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = "
  Bonjour. \n
  Vous avez fait une demande pour changer votre adresse e-mail. \n Je vous invite à present à confirmer en suivant ce lien: \n
  http://$_SERVER[HTTP_HOST]/change-email/$userID/$emailBase64/token-$tokenMD5.php";


  $data = [
    'password' => '1234',
    'to' => 'tefuddiddek-1134@yopmail.com',
    'subject' => 'Confirmation de mon E-mail',
    'message' => $message,
    'headers' => $headers,
  ];
  $envoiEmail = redirect_post('http://sendmail.codeurh24.com/', $data);


  header('Location: /change-email/envoi-email-succes/');

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
