<?php

global $errorsForm;
$errorsForm = [];
if(isset($_POST['password1'],$_POST['password2'])){
  if( $_POST['password1'] != $_POST['password2'] ){
    $errorsForm['password1'][] = 'Les mots de passe ne sont pas identiques';
    $errorsForm['password2'][] = 'Les mots de passe ne sont pas identiques';
  }
}
if(empty($_POST['password1'])){
  $errorsForm['password1'][] = 'Mot de passe requis';
}
if(empty($_POST['password2'])){
  $errorsForm['password2'][] = 'Mot de passe requis';
}

if(empty($_POST['pseudo'])){
  $errorsForm['pseudo'][] = 'Pseudo requis';
}

if(empty($_POST['email'])){
  $errorsForm['email'][] = 'Votre email est requis';
}
