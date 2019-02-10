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
if(!empty($_POST['password1']) && strlen($_POST['password1']) < 8){
  $errorsForm['password1'][] = 'Le mot de passe doit comporter au moins 8 caractères';
}
if(!empty($_POST['password2']) && strlen($_POST['password2']) < 8){
  $errorsForm['password2'][] = 'Le mot de passe doit comporter au moins 8 caractères';
}

if(!empty($_POST['password1']) ){
  if (!checkPassword($_POST['password1'])) {
    $errorsForm['password1'][] = 'Le mot de passe doit comporter au moins des lettres et des chiffres';
  }
}
if(!empty($_POST['password2']) ){
  if (!checkPassword($_POST['password2'])) {
    $errorsForm['password2'][] = 'Le mot de passe doit comporter au moins des lettres et des chiffres';
  }
}

if(!empty($_POST['password1']) ){
  if (strlen($_POST['password1']) > 30) {
    $errorsForm['password1'][] = 'Le mot de passe ne doit pas dépasser 30 caractères';
  }
}
if(!empty($_POST['password2']) ){
  if (strlen($_POST['password2']) > 30) {
    $errorsForm['password2'][] = 'Le mot de passe ne doit pas dépasser 30 caractères';
  }
}

if(empty($_POST['password2'])){
  $errorsForm['password2'][] = 'Mot de passe requis';
}

if(empty($_POST['pseudo'])){
  $errorsForm['pseudo'][] = 'Pseudo requis';
}
if(!empty($_POST['pseudo'])){
  if (!preg_match('/^([a-zA-Z0-9-_ ]+)$/', $_POST['pseudo'])) {
    $errorsForm['pseudo'][] = 'Seul les caractères alphabétique est numerique ainsi que les espaces blanc et [- _] sont autorisés';
  }
  if (strlen($_POST['pseudo']) > 30) {
    $errorsForm['pseudo'][] = 'Votre pseudo est trop long';
  }
  if (strlen($_POST['pseudo']) < 2) {
    $errorsForm['pseudo'][] = 'Votre pseudo est trop court';
  }
  if(ctype_space($_POST['pseudo'])){
    $errorsForm['pseudo'][] = 'Votre pseudo ne peut etre composé que d\'espace blanc';
  }
  if($_POST['pseudo'][0] == ' '){
    $errorsForm['pseudo'][] = 'Votre pseudo ne peut commencer par un espace blanc';
  }
}

if(empty($_POST['email'])){
  $errorsForm['email'][] = 'Votre email est requis';
}

if(!empty($_POST['email']) ){
  if (!preg_match(regexEmail, $_POST['email'])) {
    $errorsForm['email'][] = 'Votre email n\'est pas une adresse valide';
  }
  if (strlen($_POST['email']) > 40) {
    $errorsForm['email'][] = 'Votre adresse email est trop longue';
  }
}
