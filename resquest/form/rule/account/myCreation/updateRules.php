<?php

global $errorsForm;
$errorsForm = [];

if(empty($_POST['name'])){
  $errorsForm['name'][] = 'Un nom de création est requis';
}
if(!empty($_POST['name'])){
  // enlève d'eventuelles balises html php
  $_POST['name'] = strip_tags($_POST['name']);;
}

if (!preg_match('/^([a-zA-Z0-9-_ âêîôûàèìòùáéíóúäëïöüãõñç]+)$/', $_POST['name'])) {
  errorsForm('name',
   'Seul les caractères alphabétique est numerique ainsi que les espaces blanc,
    tirets et underscores sont autorisés'
  );
}
if (!preg_match('/^([a-zA-Z0-9-_ âêîôûàèìòùáéíóúäëïöüãõñç]+)$/', $_POST['description'])) {
  errorsForm('description',
   'Seul les caractères alphabétique est numerique ainsi que les espaces blanc,
    tirets et underscores sont autorisés'
  );
}

if(!empty($_POST['description'])){
  // empeche l'interpretation des balises html par le navigateur
  $_POST['description'] = htmlspecialchars($_POST['description']);
}


if(!empty($_POST['idOs'])){
  $_POST['idOs'] = htmlspecialchars($_POST['idOs']);
  $_POST['idOs'] = intval($_POST['idOs']);

  $OS = new OS();
  $os = $OS->getOS([
    ['id', '=', $_POST['idOs']]
  ])->get();

  if($os === false){
    errorsForm('idOs', 'Systeme d\'exploitation inconnu');
    $creation = getCreationByID($_POST['id']);
    $_POST['idOs'] = $creation->id_os;
  }
  // empeche l'interpretation des balises html par le navigateur
}

 ?>
