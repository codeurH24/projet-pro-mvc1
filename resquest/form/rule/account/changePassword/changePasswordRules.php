<?php


// ce code n'est plus à jour
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

 ?>
