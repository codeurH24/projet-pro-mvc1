<?php
require 'model/modelCreation.php';
require 'model/modelUser.php';
require 'model/modelRole.php';

function index(){

  view('admin/user/indexUser.view.php',[
    'users' => getUsers(),
    'roles' => getRoles()
  ]);
}
function create(){
  view('admin/user/createUser.view.php',[
    'roles' => getRoles()
  ]);
}
function store(){
    createUser(
      $_POST['pseudo'],
      $_POST['email'],
      $_POST['password1'],
      dbDate(),
      dbDate(),
      $_POST['id_role']
    );
    header('Location: /admin/utilisateurs/');
}

function edit(){
  if(getUserByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/user/updateUser.view.php',[
    'roles' => getRoles(),
    'user' =>  getUserByID($_GET['id'])
  ]);
}
function update(){
  if(getUserByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  $success = updateUser(
    $_POST['id'],
    $_POST['pseudo'],
    $_POST['email'],
    $_POST['id_role']
  );
  if($success){
    header('Location: /admin/utilisateurs/');
  }else{
    exit('Erreur de modification utilisateur par admin');
  }
}

function AJAX_updateRole(){

  $User = new User();
  $User->setIdRole($_POST['idRole']);
  $User->updateUser([
    ['id', '=', $_POST['idUser']]
  ]);
}

function passwordRequest(){
  if(getUserByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/user/password-request.view.php');
}

function sendEmailPasswordChange(){

  if(isset($_POST['answerChangePassword'])){
    if ($_POST['answerChangePassword'] != 'Oui') {
      header('Location: /admin/utilisateurs/');
    }
  }

  $IDUser = $_POST['id'];


  changePasswordUser('newpassord'.secretKey, $IDUser);

  // prépare le e-mail et l'envoi
  $tokenPatern = $IDUser.secretKey;
  $tokenMD5 = md5($tokenPatern);

  $headers = 'From: administrateur@pc-config.fr' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = "
  Bonjour. \n
  Vous avez fait une demande pour ré-initialiser votre mot de passe. \n Je vous invite à present a en choisir un nouveau en suivant ce lien: \n
  http://$_SERVER[HTTP_HOST]/change-mot-de-passse/$IDUser/token-$tokenMD5.php";


  $data = [
    'password' => '1234',
    'to' => 'tefuddiddek-1134@yopmail.com',
    'subject' => 'Demande de nouveau mot de passe',
    'message' => $message,
    'headers' => $headers,
  ];
  $envoiEmail = redirect_post('http://sendmail.codeurh24.com/', $data);

  header('Location: /admin/utilisateurs/');

}









function passwordChange(){

  if (isset($_POST['newpassword1'])) {

    $tokenPatern = $_GET['id-user'].secretKey;
    $tokenMD5 = md5($tokenPatern);
    // condition de sécurité. le tokenPartern attendu permet de ne pas pouvoir changer l'id utilisateur dans l'url
    if(isset($_GET['token']) && ! ($_GET['token'] == $tokenMD5) ){
     exit('Problème url');
    }


    $user = getUserByID($_GET['id-user']);

    // si le mot de passe de l'utilisateur est celui attendu c'est donc que la demande
    // de changer sont mot de passe a reellement été faite
    // f68cfec5c269121625a9723fb6a4441d = newpassord
    if(! password_verify( 'newpassord'.secretKey, $user->password ) ){
      exit('Problème, la demande de changement de mot de passe n\'est plus valide');
    }

    // if(password_verify( '1234', '$2y$10$2ILd56T6PgzVRPADflHpX.mhrX6vz.kmaSCwhNeKoOP/awEXubOlW' ) ){
    //   exit($_POST['newpassword1']);
    // }

    if( isset($_POST['newpassword1']) && isset($_POST['newpassword2']) && isset($_GET['id-user'])){

      if( $_POST['newpassword1'] == $_POST['newpassword2'] ){

        // changement de sont mot de passe
        changePasswordUser($_POST['newpassword1'].secretKey, $_GET['id-user']);
        header("Location: http://$_SERVER[HTTP_HOST]/change-mot-de-passse-succes.php");
        exit("Location: http://$_SERVER[HTTP_HOST]/change-mot-de-passse/success.php");
      }
    }

  }else{
    view('admin/user/password-change.view.php',[
      'title' => 'PC-CONFIG'
    ]);
  }
}

function passwordChangeSuccess(){
  view('admin/user/password-change-success.view.php',[
    'title' => 'PC-CONFIG'
  ]);
}

function deleteRequest(){
  if(getUserByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/user/deleteUser.view.php',[
    'user' => getUserByID($_GET['id'])
  ]);
}

function delete(){
  if(getUserByID($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  if( isset($_POST['id']) ){
    deleteUser($_POST['id']);
  }
  header('Location: /admin/utilisateurs/');
}

function show(){
  if(getUserByID($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  $user = getUserByID($_GET['id']);
  view('admin/user/showUser.view.php',[

    'roleName' => getRoleByID($user->id_role)->nom,
    'user' =>  $user
  ]);
}


 ?>
